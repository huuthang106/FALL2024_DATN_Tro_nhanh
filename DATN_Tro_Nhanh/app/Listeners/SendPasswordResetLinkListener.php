<?php

namespace App\Listeners;

use App\Events\PasswordResetRequestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendPasswordResetEmail;

class SendPasswordResetLinkListener
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
    public function handle(PasswordResetRequestEvent $event)
    {
        SendPasswordResetEmail::dispatch($event->email)->onQueue('emails');
    }
}
