<?php

namespace App\Services;

use App\Models\Notification as NotificationModel;

class NotificationService
{
    public static function send(int $userId, string $message): void
    {
        // Tạo một thông báo mới và lưu vào cơ sở dữ liệu
        $notification = new NotificationModel();
        $notification->user_id = $userId;
        $notification->message = $message;
        $notification->save();
    }
}
