<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        .input-group {
            margin: 15px 0;
            text-align: left;
        }
        .input-group label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .success-message {
            color: green;
            font-size: 14px;
            margin-bottom: 15px;
        }
        ul {
            padding-left: 0;
            list-style-type: none;
        }
        li {
            font-size: 14px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Email Verification</h2>
        
        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        <p>We have sent a verification code to: <strong>{{ $email }}</strong></p>

        <form action="{{ route('verify.code') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="input-group">
                <label for="verification_code">Enter Verification Code:</label>
                <input type="text" name="verification_code" required>
            </div>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>
</html>
