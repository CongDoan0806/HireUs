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

        .reset-button {
            background-color: #007bff;
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

        .reset-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Email Verification</h2>

        <div class="messages">
            <!-- Hiển thị các thông báo lỗi hoặc thành công -->
        </div>

        <form id="verify-form">
            @csrf
            <div class="input-group">
                <label for="verification_code">Enter Verification Code:</label>
                <input type="text" name="verification_code" required>
            </div>
            <button type="submit">Verify</button>
        </form>

        <button id="reset-code" style="margin-top: 20px;">Reset Verification Code</button>
    </div>

    <script>
        // Lắng nghe sự kiện submit form xác thực
        document.getElementById('verify-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Ngừng submit form thông thường

            let verificationCode = document.querySelector('[name="verification_code"]').value;
            let formData = new FormData();
            formData.append('verification_code', verificationCode);
            formData.append('_token', '{{ csrf_token() }}'); // CSRF token Laravel

            // Gửi AJAX request đến backend
            fetch('{{ route('verify.code') }}', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    let messagesDiv = document.querySelector('.messages');
                    messagesDiv.innerHTML = ''; // Clear previous messages

                    if (data.message) {
                        let successMessage = document.createElement('div');
                        successMessage.classList.add('success-message');
                        successMessage.textContent = data.message;
                        messagesDiv.appendChild(successMessage);
                        window.location.href = data.redirect_url; // Chuyển hướng người dùng đến trang đăng nhập
                    } else if (data.errors) {
                        let errorMessage = document.createElement('div');
                        errorMessage.classList.add('error-message');
                        errorMessage.textContent = data.errors.verification_code[0]; // Hiển thị lỗi nếu mã không đúng
                        messagesDiv.appendChild(errorMessage);
                    } else if (data.error) {
                        let errorMessage = document.createElement('div');
                        errorMessage.classList.add('error-message');
                        errorMessage.textContent = data.error; // Hiển thị lỗi nếu mã hết hạn
                        messagesDiv.appendChild(errorMessage);
                    }
                })
                .catch(error => {
                    alert('Đã có lỗi xảy ra. Vui lòng thử lại.');
                });
        });

        // Xử lý sự kiện reset mã xác thực
        document.getElementById('reset-code').addEventListener('click', function() {
            let email = prompt('Vui lòng nhập email của bạn để nhận lại mã xác thực:');

            if (email) {
                let formData = new FormData();
                formData.append('email', email);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ route('resend.verification.code') }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        let messagesDiv = document.querySelector('.messages');
                        messagesDiv.innerHTML = ''; // Clear previous messages

                        if (data.message) {
                            let successMessage = document.createElement('div');
                            successMessage.classList.add('success-message');
                            successMessage.textContent = data.message; // Thông báo mã xác thực đã được gửi
                            messagesDiv.appendChild(successMessage);
                        } else if (data.error) {
                            let errorMessage = document.createElement('div');
                            errorMessage.classList.add('error-message');
                            errorMessage.textContent = data.error; // Hiển thị lỗi nếu có
                            messagesDiv.appendChild(errorMessage);
                        }
                    })
                    .catch(error => {
                        alert('Đã có lỗi xảy ra. Vui lòng thử lại.');
                    });
            }
        });
    </script>
</body>

</html>
