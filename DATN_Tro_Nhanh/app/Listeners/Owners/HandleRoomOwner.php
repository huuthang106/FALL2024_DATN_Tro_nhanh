<?php

namespace App\Listeners\Owners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Owners\RoomOwnersEvent;
use Illuminate\Support\Facades\Log;
use App\Models\Notification;
use Exception;

class HandleRoomOwner
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RoomOwnersEvent $event): void
    {
        // try {
        //     Log::info('Creating notification:', [
        //         'room_id' => $event->room->id,
        //         'type' => $event->type,
        //         'data' => $event->data,
        //         'status' => $event->status,
        //         'user_id' => $event->userId // Sửa thành 'user_id'
        //     ]);
        //     Notification::create([
        //         // 'room_id' => $event->room->id,
        //         // 'type' => 'Đăng trọ',
        //         // 'data' => 'Bạn vừa đăng trọ thành công',
        //         // 'status' => 1,
        //         // 'user_id' => auth()->id(), // Lấy ID người dùng hiện tại
        //         'room_id' => $event->room->id,
        //         'type' => $event->type,
        //         'data' => $event->data,
        //         'status' => $event->status,
        //         'user_id' => $event->userId
        //     ]);
        // } catch (Exception $e) {
        //     Log::error('Error creating notification: ' . $e->getMessage());
        // }
        Notification::create([
            'type' => 'Đăng trọ',
            'data' => 'Bạn vừa đăng trọ thành công',
            'status' => 1,
            'room_id' => $event->room->id,
            'user_id' => auth()->id(), // Lấy ID người dùng hiện tại
        ]);
    }
}
