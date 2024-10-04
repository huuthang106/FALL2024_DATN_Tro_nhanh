<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>

<body
    style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ url('/') }}" style="display: inline-block; text-decoration: none;">
            <img src="{{ $message->embed(public_path('assets/images/tro-moi.png')) }}" alt="Logo"
                style="max-width: 200px;">
        </a>
    </div>

    <div style="background-color: #f4f4f4; border-radius: 5px; padding: 20px; margin-bottom: 20px;">
        <h1 style="color: #0066cc; text-align: center;">Đặt lại mật khẩu</h1>
    </div>

    <div style="background-color: #ffffff; border-radius: 5px; padding: 20px; border: 1px solid #ddd;">
        <p style="font-weight: bold;">Xin chào,</p>
        <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
        <p>Vui lòng nhấp vào nút bên dưới để đặt lại mật khẩu của bạn:</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $url }}"
                style="background-color: #0066cc; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 5px; font-weight: bold;">Đặt
                lại mật khẩu</a>
        </div>

        <p>Liên kết đặt lại mật khẩu này sẽ hết hạn sau 60 phút.</p>
        <p>Nếu bạn không yêu cầu đặt lại mật khẩu, không cần thực hiện thêm hành động nào.</p>
        <p style="font-style: italic; color: #666;">Lưu ý: Đây là email tự động, vui lòng không trả lời email này.</p>
    </div>

    <div style="text-align: center; margin-top: 20px; font-size: 12px; color: #666;">
        <p>&copy; {{ date('Y') }} Tro Nhanh. Tất cả các quyền được bảo lưu.</p>
    </div>
</body>

</html>
