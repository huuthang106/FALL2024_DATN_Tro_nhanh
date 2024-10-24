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
use App\Services\BlogServices;
class SendRoomCreatedNotification
{

    use Queueable;

    public $room;
    protected $blogServices;
    public function __construct(Room $room, BlogServices $blogServices)
    {
        $this->room = $room;
        $this->blogServices = $blogServices;
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
        $room->zone_id = $event->result; // Gán zone_id cho phòng

        if (isset($data['image'])) {
            $image = $data['image']; // Giả sử đây là đường dẫn tạm thời của hình ảnh

            // Tải lên hình ảnh vào Google Drive
            $driveFileId = '1DNPZ0KBCiY27mvOZKFg8IyyarT7PIGVF'; // ID thư mục Google Drive
            $uploadResult = $this->blogServices->uploadImageToGoogleDrive($image, $driveFileId, $image->getClientOriginalName()); // Gọi phương thức với tên đã tạo

            // Lưu ID tệp vào cơ sở dữ liệu
            $room->image = $uploadResult['id']; // Lưu ID tệp đã tải lên vào cơ sở dữ liệu
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
