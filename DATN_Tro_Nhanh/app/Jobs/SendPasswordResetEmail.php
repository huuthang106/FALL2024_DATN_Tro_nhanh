<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use App\Mail\CustomPasswordResetMail;
use Illuminate\Support\Facades\Mail;

class SendPasswordResetEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels, Dispatchable;
    protected $token;
    protected $email;
    /**
     * Create a new job instance.
     *
     * @param array $email
     * @return void
     */
    public function __construct(array $email)
    {
        //
        $this->email = $email['email'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            // Gửi liên kết đặt lại mật khẩu
            Password::broker()->sendResetLink(['email' => $this->email]);
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có
            Log::error('Lỗi khi gửi email đặt lại mật khẩu: ' . $e->getMessage());
            throw $e; // Ném lại lỗi để thông báo cho queue
        }
    }
}
