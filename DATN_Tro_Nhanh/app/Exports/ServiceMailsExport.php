<?php

namespace App\Exports;

use App\Models\ServiceMail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class ServiceMailsExport implements FromCollection, WithHeadings, WithMapping
{
    const CHUA_GUI = 0;
    const DA_GUI = 1;
    private $stt = 1;
    /**
     * @return \Illuminate\Support\Collection
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function collection()
    {
        // return ServiceMail::all();

        // return ServiceMail::where('is_sent', self::CHUA_GUI)
        //     ->where('created_at', '>=', now()->subMinute())
        //     ->get();
        return $this->data;
    }
    public function map($serviceMail): array
    {
        return [
            $this->stt++,
            $serviceMail->name,
            $serviceMail->email,
            $serviceMail->phone,
            $serviceMail->message,
            $serviceMail->created_at->format('Y-m-d H:i:s'), // Định dạng ngày giờ theo ý muốn
        ];
    }
    public function headings(): array
    {
        return [
            'STT',
            'Họ và Tên',
            'Email',
            'Số điện thoại',
            'Nội dung',
            'Ngày gửi',
        ];
    }
}
