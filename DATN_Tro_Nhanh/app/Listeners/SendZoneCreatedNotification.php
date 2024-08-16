<?php

namespace App\Listeners;

use App\Events\ZoneCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Notification;
class SendZoneCreatedNotification
{
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
    public function handle(ZoneCreated $event): void
    {
        //
        Notification::create([
            'type' => 'Thêm khu trọ',
            'data' => 'Bạn vừa thêm khu trọ thành công',
            'status' => 1,
            'zone_id' => $event->zone->id,
            'user_id' => auth()->id(), // Lấy ID người dùng hiện tại
        ]);
    }
}
