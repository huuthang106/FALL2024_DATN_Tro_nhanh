<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceMailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $serviceMails;
    public $filePath;

    public function __construct($serviceMails, $filePath = null)
    {
        $this->serviceMails = $serviceMails;
        $this->filePath = $filePath;
    }

    public function build()
    {
        $mail = $this->view('emails.service-mail-notification')
            ->subject('Danh Sách Dịch Vụ Cần Hỗ Trợ');

        if ($this->filePath && file_exists($this->filePath)) {
            $mail->attach($this->filePath);
        }

        return $mail;
    }
}
