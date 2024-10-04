<?php

namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
// use Illuminate\Queue\SerializesModels;

// class CustomPasswordResetMail extends Mailable
// {
//     use Queueable, SerializesModels;
//     public $token;
//     public $email;
//     /**
//      * Create a new message instance.
//      */
//     public function __construct($token, $email)
//     {
//         $this->token = $token;
//         $this->email = $email;
//     }
//     /**
//      * Get the message envelope.
//      */
//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: 'Đặt Lại Mât Khẩu',
//         );
//     }

//     /**
//      * Get the message content definition.
//      */
//     // public function content(): Content
//     // {
//     //     return new Content(
//     //         view: 'emails.password_reset',
//     //     );
//     // }
//     public function build()
//     {
//         return $this->view('emails.password_reset')
//             ->with([
//                 'url' => $this->token,
//                 'email' => $this->email,
//             ]);
//     }
//     /**
//      * Get the attachments for the message.
//      *
//      * @return array<int, \Illuminate\Mail\Mailables\Attachment>
//      */
//     public function attachments(): array
//     {
//         return [];
//     }
// }
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomPasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function build()
    {
        return $this->subject('Đặt lại mật khẩu')
            ->markdown('emails.custom-reset-password')
            ->with([
                'url' => $this->url,
            ]);
    }
}
