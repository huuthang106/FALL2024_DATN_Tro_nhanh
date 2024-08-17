<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Zone;

class SendZoneCreatedNotification extends Notification
{
    use Queueable;

    public $zone;

    public function __construct(Zone $zone)
    {
        $this->zone = $zone;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Một khu trọ mới đã được tạo:')
                    ->line('Tên: ' . $this->zone->name)
                    ->line('Địa chỉ: ' . $this->zone->address)
                    ->action('Xem chi tiết', url('/admin/khutro/' . $this->zone->id))
                    ->line('Cảm ơn bạn đã sử dụng ứng dụng!');
    }
}

