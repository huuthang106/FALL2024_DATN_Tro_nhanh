<?php

namespace App\Listeners;

use App\Events\Admin\ZoneUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
class SendZoneUpdatedNotification extends Notification
{
    use Queueable;

    public $zone;

    public function __construct(ZoneUpdated $event)
    {
        $this->zone = $event->zone;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Khu trọ đã được cập nhật:')
            ->line('Tên: ' . $this->zone->name)
            ->line('Địa chỉ: ' . $this->zone->address)
            ->action('Xem chi tiết', url('/admin/khutro/' . $this->zone->id))
            ->line('Cảm ơn bạn đã sử dụng ứng dụng!');
    }
}
