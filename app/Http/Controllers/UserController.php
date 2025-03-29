<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

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

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            Session::put('user', $user);
    
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


}
