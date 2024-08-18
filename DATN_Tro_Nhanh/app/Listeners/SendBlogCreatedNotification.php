<?php

namespace App\Listeners;

use App\Events\BlogCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\BlogCreatedMail;
use Illuminate\Support\Facades\Log;

class SendBlogCreatedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  BlogCreated  $event
     * @return void
     */
    public function handle(BlogCreated $event)
    {
        try {
            Mail::to($event->blog->user->email)->send(new BlogCreatedMail($event->blog));
            Log::info('Blog được tạo thành công ' . $event->blog->title);
        } catch (\Exception $e) {
            Log::error('Blog được tạo không thành công : ' . $event->blog->title . ' - Error: ' . $e->getMessage());
        }
    }

    /**
     * Handle a job failure.
     *
     * @param  BlogCreated  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(BlogCreated $event, $exception)
    {
        Log::error('Tạo blog không thành công ' . $event->blog->title . ' - Error: ' . $exception->getMessage());
    }
}
