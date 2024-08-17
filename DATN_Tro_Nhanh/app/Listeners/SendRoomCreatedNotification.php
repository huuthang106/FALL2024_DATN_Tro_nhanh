<?php

namespace App\Listeners;

use App\Events\RoomCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendRoomCreatedNotification
{
    use InteractsWithQueue;

    public function handle(RoomCreated $event)
    {
        // Gửi thông báo, ghi log, hoặc thực hiện các hành động khác
        Log::info('A new room has been created: ' . $event->room->title);
    }
}
