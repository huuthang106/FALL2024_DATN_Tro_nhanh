<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\BlogCreated;
use App\Notifications\SendBlogCreatedNotification as BlogNotification;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
class SendBlogCreatedNotification
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
    public function handle(BlogCreated $event): void
    {
        // Gửi thông báo với blog_id
        Notification::send(
            Auth::id(),  // ID người dùng hiện tại
            $event->blog->id,  // Truyền blog_id vào
            'Bạn vừa tạo một blog mới thành công'
        );
    }
}
