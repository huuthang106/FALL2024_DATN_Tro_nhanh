<?php

namespace App\Jobs;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Foundation\Queue\Queueable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\Password;
// use Illuminate\Support\Facades\Log;
// use App\Mail\CustomPasswordResetMail;
// use Illuminate\Support\Facades\Mail;

// class SendPasswordResetEmail implements ShouldQueue
// {
//     use InteractsWithQueue, Queueable, SerializesModels, Dispatchable;
//     protected $token;
//     protected $email;
//     /**
//      * Create a new job instance.
//      *
//      * @param array $email
//      * @return void
//      */
//     public function __construct(array $email)
//     {
//         //
//         $this->email = $email['email'];
//     }

//     /**
//      * Execute the job.
//      *
//      * @return void
//      */
//     public function handle(): void
//     {
//         try {
//             // Gửi liên kết đặt lại mật khẩu
//             Password::broker()->sendResetLink(['email' => $this->email]);
//         } catch (\Exception $e) {
//             // Ghi lại lỗi nếu có
//             Log::error('Lỗi khi gửi email đặt lại mật khẩu: ' . $e->getMessage());
//             throw $e; // Ném lại lỗi để thông báo cho queue
//         }
//     }
// }

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\Password;
// use Illuminate\Support\Facades\Log;

// class SendPasswordResetEmail implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     protected $email;

//     public function __construct($email)
//     {
//         $this->email = $email;
//     }

//     public function handle()
//     {
//         try {
//             Password::broker()->sendResetLink(['email' => $this->email]);
//             Log::info('Đã gửi liên kết đặt lại mật khẩu đến: ' . $this->email);
//         } catch (\Exception $e) {
//             Log::error('Lỗi khi gửi liên kết đặt lại mật khẩu: ' . $e->getMessage());
//         }
//     }
// }


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomPasswordResetMail;
use App\Models\User;

class SendPasswordResetEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $token = Password::createToken($user);
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $this->email,
            ], false));

            Mail::to($this->email)->send(new CustomPasswordResetMail($url));
        } else {
            // Xử lý trường hợp không tìm thấy người dùng
            // \Log::error("Không tìm thấy người dùng với email: {$this->email}");
        }
    }
}
