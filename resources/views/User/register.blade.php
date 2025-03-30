@extends('User.master')

@section('title', 'Register Page')

@section('content')
    <div class="register-container">
        <h3 class="welcome-text">Welcome to
            <img src="{{ asset('images/logo.png') }}" alt="ITviec Logo" class="logo">
        </h3>

        <h1 class="signup-title">Sign up</h1>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Vui lòng kiểm tra lại thông tin đăng ký!',
                });
            </script>
        @endif

        <form action="{{ route('register-post') }}" method="POST" class="signup-form">
            @csrf
            <div class="checkbox-container">
                <input type="checkbox" id="agree">
                <label for="agree">
                    By signing up with Google, I agree to ITviec’s
                    <a href="">Terms & Conditions</a> and
                    <a href="">Privacy Policy</a>
                    in relation to your privacy information.
                </label>
            </div>
            <button class="google-signup" type="submit">
                <img src="{{ asset('images/google.png') }}" alt="Google" class="google-icon">
                <span>Sign up with Google</span>
            </button>

            <div class="or-divider">
                <div class="line"></div>
                <span>OR</span>
                <div class="line"></div>
            </div>

            <div class="input-group">
                <label for="name">Full Name *</label>
                <input type="text" name="full_name" id="name" placeholder="Your full name" required>
                @error('full_name')
                    <p class="error-message" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="email">Email Address *</label>
                <input type="email" name="email" id="email" placeholder="Your email" required>
                @error('email')
                    <p class="error-message" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="password">Password *</label>
                <input type="password" name="password" id="password" placeholder="Create a password" required>
                @error('password')
                    <p class="error-message" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="role">You want to register as: *</label>
                <select name="role" id="role" required>
                    <option value="applicant">Applicant</option>
                    <option value="recruiter">Recruiter</option>
                </select>
                @error('role')
                    <p class="error-message" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <ul class="password-requirements">
                <li>At least 12 characters</li>
                <li>At least 1 symbol (! @ # $ ...)</li>
                <li>At least 1 number</li>
                <li>At least 1 UPPERCASE letter</li>
                <li>At least 1 lowercase letter</li>
            </ul>

            <div class="terms-container">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">
                    I agree to ITviec’s
                    <a href="" class="link">Terms & Conditions</a> and
                    <a href="" class="link">Privacy Policy</a>.
                </label>
            </div>

            <button type="submit" class="submit-btn">Create Account</button>

            <p class="signin-text">Already have an account?
                <a href="" class="link">Log in</a>
            </p>
        </form>
    </div>

@endsection
