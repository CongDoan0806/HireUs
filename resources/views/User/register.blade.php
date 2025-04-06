@extends('Layout.master')

@section('title', 'Register Page')

@section('content')
    <div class="container-register-box">

        <div class="register-container">
            <h3 class="welcome-text">Welcome to
                <img src="assets/images/logo/logo.png" alt="ITviec Logo" class="logo">
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
                    <input type="checkbox" id="agree" name="agree">
                    <div for="agree">
                        By signing up with Google, I agree to ITviec’s
                        <a href="" class="link">Terms & Conditions</a> and
                        <a href="" class="link">Privacy Policy</a>
                        in relation to your privacy information.
                    </div>
                </div>
                <button class="google-signup" type="submit">
                    <a href="{{ route('google.login') }}">
                        <img src="assets/images/logo/Logo_Google(1).png" alt="Google" class="google-icon">
                        <span style="color: dimgray">Sign up with Google</span>
                    </a>
                </button>

                <div class="or-divider">
                    <div class="line"></div>
                    <span>OR</span>
                    <div class="line"></div>
                </div>

                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="full_name" id="name" placeholder="Your full name" required>
                    @error('full_name')
                        <p class="error-message" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Your email" required>
                    @error('email')
                        <p class="error-message" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Create a password" required>
                    @error('password')
                        <p class="error-message" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <label for="role">You want to register as</label>
                    <select name="role" id="role" required>
                        <option value="applicant">Applicant</option>
                        <option value="recruiter">Recruiter</option>
                    </select>
                    @error('role')
                        <p class="error-message" style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                <ul class="password-requirements">
                    <li id="char-length" class="neutral">At least 12 characters</li>
                    <li id="symbol" class="neutral">At least 1 symbol (! @ # $ ...)</li>
                    <li id="number" class="neutral">At least 1 number</li>
                    <li id="uppercase" class="neutral">At least 1 UPPERCASE letter</li>
                    <li id="lowercase" class="neutral">At least 1 lowercase letter</li>
                </ul>



                <div class="terms-container">
                    <input type="checkbox" id="terms" name="terms" required>
                    <div for="terms">
                        I have read and agree to HireUs’s
                        <a href="" class="link">Terms & Conditions</a> and
                        <a href="" class="link">Privacy Policy</a>.

                    </div>
                </div>

                <button type="submit" class="submit-btn">Sign up with Email</button>

                <p class="signin-text">Already have an account?
                    <a href="/login" class="link">Log in</a>
                </p>
            </form>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/register.js') }}"></script>
    @endpush
@endsection
