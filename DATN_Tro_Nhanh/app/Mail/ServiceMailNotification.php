<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServiceMailsExport;
use Maatwebsite\Excel\Excel as ExcelFormat;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ServiceMailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $data;
    protected $filePath;
    public function __construct($data, $filePath)
    {
        $this->data = $data;
        $this->filePath = $filePath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo về Dịch vụ',
        );
    }

    // /**
    //  * Get the message content definition.
    //  */
    public function content(): Content
    {
        return new Content(
            view: 'emails.service_mail_notification',
            with: ['data' => $this->data]  // Truyền biến $data vào view
        );
    }
    public function build()
    {

        // $export = new ServiceMailsExport(); // Exports your data
        // $fileName = 'HoTro.xlsx';

        // return $this->view('emails.service_mail_notification')
        //     ->attachData(Excel::raw($export, \Maatwebsite\Excel\Excel::XLSX), $fileName, [
        //         'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        //     ]);
        // $fileName = 'HoTroDichVu24h.xlsx';
        // $filePath = storage_path('app/public/assets/' . $fileName);

        // // Lưu file Excel vào thư mục public/assets
        // Excel::store(new ServiceMailsExport, 'public/assets/' . $fileName);

        // return $this->attach($filePath, [
        //     'as' => $fileName,
        //     'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        // ]);

        return $this->view('emails.service_mail_notification')
            ->attach($this->filePath, [
                'as' => 'HoTroDichVu24h.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]);
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
