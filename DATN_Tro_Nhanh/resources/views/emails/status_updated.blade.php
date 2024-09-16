<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông báo duyệt đơn</title>
    <style>
        /* Cài đặt cho toàn bộ email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }

        h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #666666;
            line-height: 1.6;
        }

        .status {
            font-size: 18px;
            color: #008080;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #999999;
        }

        .footer a {
            color: #008080;
            text-decoration: none;
        }

        /* Tạo khoảng cách cho chữ */
        .message {
            margin-bottom: 15px;
        }

        /* Định dạng nút cho các thông tin quan trọng */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #008080;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #006666;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h1>Thân gửi {{ $user->name }},</h1>

        <p class="message">Đơn xin làm chủ trọ của bạn đã được duyệt.
        </p>

      <p class="message">Bạn có thể truy cập web để biết thêm.</p>

        <a href="https://tronhanh.com/" class="btn">Cick vào đây</a>

        <div class="footer">
            <p>TroNhanh</p>
        </div>
    </div>
</body>
</html>