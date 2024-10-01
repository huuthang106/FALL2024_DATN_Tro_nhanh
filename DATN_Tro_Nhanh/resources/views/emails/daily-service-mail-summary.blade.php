<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng hợp yêu cầu dịch vụ ngày {{ $date->format('d/m/Y') }}</title>
</head>

<body
    style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ $message->embed(public_path('assets/images/tro-moi.png')) }}" alt="Logo"
            style="max-width: 200px;">
    </div>

    <div style="background-color: #f4f4f4; border-radius: 5px; padding: 20px; margin-bottom: 20px;">
        <h1 style="color: #0066cc; text-align: center;">Tổng hợp yêu cầu dịch vụ ngày {{ $date->format('d/m/Y') }}</h1>
    </div>

    <div style="background-color: #ffffff; border-radius: 5px; padding: 20px; border: 1px solid #ddd;">
        <p style="font-weight: bold;">Kính gửi Admin,</p>
        <p>Đính kèm là file Excel chứa tổng hợp các yêu cầu dịch vụ của ngày {{ $date->format('d/m/Y') }}.</p>
        <p>Vui lòng kiểm tra file đính kèm để biết thêm chi tiết.</p>
        <p style="font-style: italic; color: #666;">Lưu ý: Đây là email tự động, vui lòng không trả lời email này.</p>
    </div>

    <div style="text-align: center; margin-top: 20px; font-size: 12px; color: #666;">
        <p>&copy; {{ date('Y') }} Tro Nhanh. Tất cả các quyền được bảo lưu.</p>
    </div>
</body>

</html>
