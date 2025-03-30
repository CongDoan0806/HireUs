<style>
    .test-email {
        font-family: Arial, sans-serif;
        color: #333;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
    }
    .test-email h2 {
        color: #2c3e50;
    }
    .test-email p {
        line-height: 1.6;
    }
</style>
<div class="test-email">
    <h2>Hi {{ $name }},</h2>
    <p>
        Chào {{ $name }},<br>
        Chào mừng bạn đến với HireUs!<br>
        Hãy nhấn vào liên kết bên dưới để xác nhận email và hoàn tất đăng ký.<br>
        <a href="{{ url('/verify-email?email=' . urlencode($name)) }}">Xác nhận Email</a>
    </p>
</div>
