<?php

namespace App\Exports;

use App\Models\ServiceMail;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ServiceMailsExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $query;
    protected $rowNumber = 0;

    public function __construct($query = null)
    {
        $yesterday = Carbon::yesterday();
        $this->query = $query ?? ServiceMail::query()
            ->whereDate('created_at', $yesterday)
            ->where('is_sent', 0);
    }

    public function query()
    {
        return $this->query;
    }

    public function headings(): array
    {
        return [
            'STT',
            'Tên',
            'Email',
            'Số điện thoại',
            'Nội dung',
            'Trạng thái',
            'Ngày tạo'
        ];
    }

    public function map($row): array
    {
        $this->rowNumber++;
        return [
            $this->rowNumber,
            $row->name,
            $row->email,
            $row->phone,
            $row->message,
            '',
            $row->created_at->format('d/m/Y H:i:s')
        ];
    }
}
