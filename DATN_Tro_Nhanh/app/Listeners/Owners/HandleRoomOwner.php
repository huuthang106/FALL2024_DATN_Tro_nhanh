<?php

namespace App\Listeners\Owners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

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
    public function handle(object $event): void
    {
        //
        $room = $event->room;
        // Xử lý thông báo hoặc logic cần thiết
        Log::info("Phòng trọ đã tạo: {$room->title}");
    }
}
