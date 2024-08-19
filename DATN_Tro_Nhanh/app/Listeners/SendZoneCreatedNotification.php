<?php

namespace App\Listeners;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification as Notifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Zone;
use App\Events\ZoneCreated;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
class SendZoneCreatedNotification extends Notifications
{
    use Queueable;

    public $zone;

    public function __construct(Zone $zone)
    {
        $this->zone = $zone;
    }
    public function handle(ZoneCreated $event): void
    {
        //
        $user_id = Auth::id();
        Notification::create([
            'type' => 'Thêm khu trọ',
            'data' => 'Bạn vừa thêm khu trọ thành công',
            'status' => 1,
            'zone_id' => $event->zone->id,
            'user_id' => $user_id, // Lấy ID người dùng hiện tại
        ]);



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

