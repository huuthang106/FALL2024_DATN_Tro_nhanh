<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Blog;

class SendBlogCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function via($notifiable)
    {
        return ['notifications'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new blog has been created: ' . $this->blog->title)
                    ->action('View Blog', url('/blogs/'.$this->blog->id))
                    ->line('Thank you for using our application!');
    }
}
