<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ServiceMailService;
use App\Models\ServiceMail;

class SendServiceMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $serviceMail;

    public function __construct(ServiceMail $serviceMail)
    {
        $this->serviceMail = $serviceMail;
    }

    public function handle(ServiceMailService $serviceMailService)
    {
        $serviceMailService->sendImmediateEmail($this->serviceMail);
    }
}
