<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\UserFollowed;
use App\Models\Notification;
use App\Models\User;
class SendFollowNotification
{
    /**
     * Create the event listener.
     */
    private const show =1;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserFollowed $event)
    {
        $follower = User::find($event->follower);
        // Thêm thông báo vào bảng notifications
        Notification::create([
            'user_id'=>$event->person_being_followed_id,
            'watch_list_id' => $event->watchListId,  // ID của người được theo dõi từ bảng watch_list
            'type'=> ' Lượt theo dõi mới ',
            'data' => "{$follower->name} đã theo dõi bạn.",
            'status'=> self::show,

            // Thêm các thuộc tính khác nếu cần
        ]);
    }
}
