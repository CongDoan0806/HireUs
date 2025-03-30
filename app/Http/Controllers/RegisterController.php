<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class RegisterController extends Controller
{
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $verification_code = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'verification_code' => $verification_code,
            'is_verified' => false,
        ]);

        Mail::to($request->email)->send(new VerifyEmail($verification_code));

        return redirect()->route('verify.form', ['email' => $request->email])
            ->with('success', 'A verification code has been sent to your email. Please check your inbox.');
    }

    public function showVerificationForm(Request $request)
    {
        return view('auth.verify', ['email' => $request->email]);
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'verification_code' => 'required|digits:4',
        ]);

        $user = User::where('email', $request->email)->where('verification_code', $request->verification_code)->first();

        if (!$user) {
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);
        }

        $user->update(['verification_code' => null]);

        return redirect()->route('login')->with('success', 'Email verified successfully!');
    }   
}
