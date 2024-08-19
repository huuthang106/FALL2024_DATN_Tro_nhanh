<!DOCTYPE html>
<html>

<head>
    <title>Đặt lại mật khẩu</title>
</head>

<body>
    <h1>Xin chào!</h1>
    <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
    <p>
        <a href="{{ url(route('password.reset', ['token' => $token]) . '?email=' . urlencode($email)) }}">
            Đặt lại mật khẩu
        </a>
    </p>
    <p>Liên kết đặt lại mật khẩu này sẽ hết hạn sau 60 phút.</p>
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, không cần thực hiện thêm hành động nào.</p>
    <p>Trân trọng, <br> Laravel</p>
</body>

</html>
