<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực Email</title>
</head>
<body>
    <h2>Chào {{ $user->full_name }},</h2>
    <p>Chúng tôi đã nhận được yêu cầu đăng ký tài khoản từ email của bạn.</p>
    <p>Mã xác thực của bạn là: <strong>{{ $verification_code }}</strong></p>
    <p>Vui lòng nhập mã này trên trang xác thực để hoàn tất đăng ký.</p>
    <p>Trân trọng,</p>
    <p>Đội ngũ hỗ trợ HireUs</p>
</body>
</html>