<?php

namespace App\Listeners;

use Illuminate\Bus\Queueable;
use App\Models\Room;
use App\Events\RoomCreated;
use App\Models\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SendRoomCreatedNotification
{

    use Queueable;

    public $room;

    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    /**
     * Handle the event.
     *
     * @param  RoomCreated  $event
     * @return void
     */
    public function handle(RoomCreated $event): void
    {
        $room = $event->room;

        // Lưu thông báo vào bảng notifications
        Notification::create([
            'type' => 'đăng trọ',
            'data' => 'Bạn vừa đăng trọ thành công.',
            'status' => 1,
            'room_id' => $room->id,
            'user_id' => auth()->id()
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
            ->line('Tên: ' . $this->room->name)
            ->line('Địa chỉ: ' . $this->room->address)
            ->action('Xem chi tiết', url('/admin/khutro/' . $this->room->id))
            ->line('Cảm ơn bạn đã sử dụng ứng dụng!');
    }
}
