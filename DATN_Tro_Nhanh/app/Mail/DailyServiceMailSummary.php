<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class DailyServiceMailSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath;
    public $date;
    public function __construct($filePath, $date)
    {
        $this->filePath = $filePath;
        $this->date = $date;
    }

    public function build()
    {
        return $this->view('emails.daily-service-mail-summary')
            ->subject('Tổng hợp yêu cầu dịch vụ hàng ngày ' . $this->date->format('d/m/Y'))
            ->attach($this->filePath);
    }
}
