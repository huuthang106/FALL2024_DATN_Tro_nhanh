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
        // Lấy dữ liệu từ sự kiện
        $data = $event->data;

        // Tạo một đối tượng Room mới
        $room = new Room();
        $room->title = $data['title']; // Lấy tên từ dữ liệu
        $room->description = $data['description']; // Lấy mô tả từ dữ liệu
        $room->price = $data['price']; // Lấy giá từ dữ liệu
        $room->quantity = $data['quantity'] ?? 1; // Lấy số lượng từ dữ liệu, mặc định là 1

        if (isset($data['image'])) {
            $image = $data['image']; // Giả sử đây là đường dẫn tạm thời của hình ảnh
            // Đổi tên file
            $newFileName = time() . '_' . $image->getClientOriginalName(); // Tạo tên file mới
            $path = 'assets/images';

            // Di chuyển ảnh vào thư mục đích
            $image->move(public_path($path), $newFileName); // Lưu hình ảnh vào thư mục 'public/assets/images'

            $room->image = $newFileName; // Lưu tên file mới vào cơ sở dữ liệu
        }


        $room->save();
    }

    // Hàm để tạo slug từ tên
    // private function generateSlug($name, $id)
    // {
    //     // Chuyển đổi tên thành slug và thêm ID
    //     return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))) . '-' . $id;
    // }
}

    // public function via($notifiable)
    // {
    //     return ['mail'];
    // }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->line('Một khu trọ mới đã được tạo:')
    //         ->line('Tên: ' . $this->room->name)
    //         ->line('Địa chỉ: ' . $this->room->address)
    //         ->action('Xem chi tiết', url('/admin/khutro/' . $this->room->id))
    //         ->line('Cảm ơn bạn đã sử dụng ứng dụng!');
    // }
