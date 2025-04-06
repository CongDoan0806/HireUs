<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Jobs\ExpireVerificationCode;
use Carbon\Carbon;

class UserController extends Controller
{
    public function login()
    {
        return view('User.login');
    }
    // Xử lý đăng nhập
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email chưa được đăng ký. Vui lòng đăng ký tài khoản.',
            ]);
        }
    
        // Kiểm tra email đã được xác thực hay chưa
        if (!$user->is_verified) {
            return back()->withErrors([
                'email' => 'Email của bạn chưa được xác thực. Vui lòng kiểm tra email và xác thực tài khoản.',
            ]);
        }
    
        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
    
            if ($user->role == 'recruiter') {
                session()->flash('message', 'Đăng nhập thành công!');
                return redirect('/recruiter/dashboard');
            } elseif ($user->role == 'applicant') {
                session()->flash('message', 'Đăng nhập thành công!');
                return redirect('/applicant/dashboard');
            } elseif ($user->role == 'admin') {
                session()->flash('message', 'Đăng nhập thành công!');
                return redirect('/admin/dashboard');
            }
        }
    
        return back()->withErrors([
            'password' => 'Mật khẩu không đúng, vui lòng thử lại.',
        ]);
    }
    
    public function showRegistrationForm()
    {
        return view('User.register');
    }

    public function register(Request $request)
    {
        $messages = [
            'password.min' => 'Error password, please try again.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'email.unique' => 'The email has already been taken.',
            'email.email' => 'The email must be a valid email address.',
            'full_name.required' => 'The full name field is required.',
            'full_name.string' => 'The full name must be a string.',
        ];

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:12',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[\W]/',
            ],
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $verification_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'verification_code' => $verification_code,
            'is_verified' => false,
            'sent_at' => now(),
        ]);
        
        // Gửi mã xác thực qua email
        Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user, $verification_code));

        // Tạo job để hết hạn mã sau 1 phút
        dispatch(new ExpireVerificationCode($user->user_id))->delay(now()->addMinutes(1));

        return view('services.auth.verify')->with('message', 'Mã xác thực đã được gửi tới email của bạn. Vui lòng kiểm tra hộp thư.');
    }

    public function showVerificationForm(Request $request)
    {
        return view('services.auth.verify');
    }

    public function verifyCode(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'verification_code' => 'required|numeric|digits:4',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Truy vấn người dùng có mã xác thực tương ứng
        $user = User::where('verification_code', $request->verification_code)->first();
    
        if (!$user) {
            return response()->json([
                'errors' => ['verification_code' => ['Mã xác thực không đúng.']]
            ], 422);
        }
    
        // Kiểm tra xem mã có hết hạn (1 phút) hay không
        $sentAt = $user->sent_at;
        $expiryTime = Carbon::now()->diffInSeconds($sentAt);
    
        if ($expiryTime > 60) {
            return response()->json([
                'error' => 'Mã xác thực đã hết hạn. Vui lòng yêu cầu mã mới.'
            ], 400);
        }
    
        // Cập nhật trạng thái xác thực
        $user->update(['is_verified' => true]);
    
        return response()->json([
            'message' => 'Xác thực thành công. Bạn có thể đăng nhập.',
            'redirect_url' => route('login')
        ]);
    }
    
    // Phương thức gửi lại mã xác thực
    public function resendVerificationCode(Request $request)
    {
        // Kiểm tra nếu người dùng đã đăng ký
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'error' => 'Email không tồn tại.'
            ], 404);
        }

        // Kiểm tra xem mã xác thực trước đó có hết hạn chưa
        $expiryTime = Carbon::now()->diffInSeconds($user->sent_at);

        if ($expiryTime < 60) {
            return response()->json([
                'error' => 'Mã xác thực vẫn còn hiệu lực.'
            ], 400);
        }

        // Tạo mã xác thực mới
        $verification_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Cập nhật mã xác thực mới và thời gian gửi
        $user->update([
            'verification_code' => $verification_code,
            'sent_at' => now(),
        ]);

        try {
            // Gửi lại mã xác thực qua email
            Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user, $verification_code));
        } catch (\Exception $e) {
            Log::error("Email sending failed: " . $e->getMessage());
            return response()->json(['error' => 'Đã xảy ra lỗi khi gửi email. Vui lòng thử lại.'], 500);
        }

        // Trả về thông báo
        return response()->json([
            'message' => 'Mã xác thực mới đã được gửi. Vui lòng kiểm tra email của bạn.'
        ]);
    }

    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogle()
    {
        /** @var \Laravel\Socialite\Two\GoogleProvider $driver */     // Đừng ai xóa cái này nha, lỗi đó :))))
        $driver = Socialite::driver('google');


        $googleUser = $driver->stateless()->user();

        $user = User::where('email', $googleUser->getEmail())->first();


        if (!$user) {
            $user = User::create([
                'full_name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'image' => $googleUser->getAvatar(),
                'phone' => 'Not available',
                'role' => 'applicant',
                'password' => bcrypt(uniqid())
            ]);
        }
        // Đăng nhập user vào hệ thống, cái này nó đã tự động lưu session r nha mấy đứa
        Auth::login($user);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function addComment(Request $request){
        $request->validate([
            'company_id' => 'required|exists:companies,company_id',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        if (!auth()->user()) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $comment = new Comment();
        $comment->company_id = $request->company_id;
        $comment->user_id = auth()->id();
        $comment->comment_content = $request->content;
        $comment->rating = $request->rating;
        $comment->created_at = now();
        $comment->save();

        return response()->json([
            'comment' => [
                'user_name' => auth()->user()->full_name,
                'user_image' => auth()->user()->image ? auth()->user()->image : asset('assets/images/avatars/avatar_default.png'),
                'created_at' => $comment->created_at->format('Y-m-d H:i:s'),
                'comment_content' => $comment->comment_content,
                'rating' => $comment->rating,
            ]
        ]);
    }

}
