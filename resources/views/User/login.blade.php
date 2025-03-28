<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="info-login">
                <h2>Welcome to HireUs</h2>
                <p>By signing in, you agree to ITviec's <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a> in relation to your privacy information</p>

                <button class="btn google-btn">
                    <img src="/assets/images/logo/Logo_Google.png" alt="Google Logo" width="20">
                    Sign In with Google
                </button>

                <div class="divider">
                    <span>or</span>
                </div>

                <form action="/login" method="POST">
                    <div class="form-group">
                        <input type="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" required>
                    </div>
                    <div class="forgot-password">
                        <a href="#">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn">Sign In with Email</button>
                </form>

                <div class="text-center">
                    <p>Do not have an account? <a href="#">Sign up now!</a></p>
                </div>
            </div>

            <div class="note-login">
                <h3>Sign in to get instant access to thousands of reviews and salary information</h3>
                <ul>
                    <li>View salary to help you negotiate your offer or pay rise</li>
                    <li>Find out about benefits, interview, company culture via reviews</li>
                    <li>Easy apply with only 1 click</li>
                    <li>Manage your own profile & privacy</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
