<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo yêu cầu dịch vụ mới</title>
</head>

<body>
    <h1>Thông báo yêu cầu dịch vụ mới</h1>

    @foreach ($serviceMails as $serviceMail)
        <div style="margin-bottom: 20px; border: 1px solid #ddd; padding: 10px;">
            <p><strong>Tên:</strong> {{ $serviceMail->name }}</p>
            <p><strong>Email:</strong> {{ $serviceMail->email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $serviceMail->phone }}</p>
            <p><strong>Nội dung:</strong> {{ $serviceMail->message }}</p>
            <p><strong>Thời gian gửi:</strong> {{ $serviceMail->created_at->format('d/m/Y H:i:s') }}</p>
        </div>
    @endforeach

    @if (isset($filePath))
        <p>Vui lòng xem file đính kèm để biết thêm chi tiết.</p>
    @endif
</body>

</html>
