<?php

namespace App\Services;

use App\Models\ServiceMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServiceMailsExport;
use App\Mail\DailyServiceMailSummary;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ServiceMailService
{
    const CHUA_GUI = 0;
    const DA_GUI = 1;

    public function store(array $validatedData)
    {
        return ServiceMail::create($validatedData);
    }
    // Gửi mail queue
    // public function sendDailySummary(Carbon $date)
    // {
    //     try {
    //         Log::info('Bắt đầu gửi email tổng hợp cho ngày ' . $date->format('Y-m-d'));

    //         $query = ServiceMail::whereDate('created_at', $date)
    //             ->where('is_sent', self::CHUA_GUI);
    //         $data = $query->get();

    //         if ($data->isEmpty()) {
    //             Log::info('Không có dữ liệu mới (chưa gửi) cho ngày ' . $date->format('Y-m-d'));
    //             return;
    //         }

    //         Log::info('Số lượng bản ghi chưa gửi: ' . $data->count());

    //         $fileName = 'service_mails_summary_' . $date->format('Y-m-d') . '.xlsx';
    //         $filePath = storage_path('app/public/' . $fileName);

    //         Excel::store(new ServiceMailsExport($query), $fileName, 'public');
    //         Log::info('File Excel đã được tạo: ' . $filePath);

    //         $adminEmail = config('mail.admin_email', 'votanluon194@gmail.com');
    //         Mail::to($adminEmail)->send(new DailyServiceMailSummary($filePath, $date));

    //         $query->update(['is_sent' => self::DA_GUI]);

    //         Log::info('Đã gửi email tổng hợp thành công và cập nhật trạng thái.');
    //     } catch (\Exception $e) {
    //         Log::error('Lỗi khi gửi email tổng hợp: ' . $e->getMessage());
    //     }
    // }
    // Gửi mail test
    // public function sendDailySummary()
    // {
    //     try {
    //         Log::info('Bắt đầu gửi email tổng hợp hàng ngày');

    //         $query = ServiceMail::where('is_sent', self::CHUA_GUI);
    //         $data = $query->get();

    //         if ($data->isEmpty()) {
    //             Log::info('Không có dữ liệu mới (chưa gửi) để tổng hợp.');
    //             return;
    //         }

    //         Log::info('Số lượng bản ghi chưa gửi được lấy: ' . $data->count());

    //         $fileName = 'danh_sach_dich_vu_' . now()->format('Y-m-d_H-i') . '.xlsx';
    //         $filePath = storage_path('app/public/' . $fileName);

    //         Excel::store(new ServiceMailsExport($query), $fileName, 'public');
    //         Log::info('File Excel chứa dữ liệu chưa gửi đã được tạo: ' . $filePath);

    //         $adminEmail = config('mail.admin_email', 'votanluon194@gmail.com');
    //         Mail::to($adminEmail)->send(new DailyServiceMailSummary($filePath));
    //         Log::info('Email tổng hợp dữ liệu chưa gửi đã được gửi đến: ' . $adminEmail);

    //         $query->update(['is_sent' => self::DA_GUI]);

    //         Log::info('Đã gửi email tổng hợp thành công và cập nhật trạng thái.');
    //     } catch (\Exception $e) {
    //         Log::error('Lỗi khi gửi email tổng hợp: ' . $e->getMessage());
    //     }
    // }
    // Gửi mail 1day
    public function sendDailySummary()
    {
        try {
            Log::info('Bắt đầu gửi email tổng hợp hàng ngày');

            $yesterday = Carbon::yesterday();
            $query = ServiceMail::whereDate('created_at', $yesterday)
                ->where('is_sent', self::CHUA_GUI);
            $data = $query->get();

            if ($data->isEmpty()) {
                Log::info('Không có dữ liệu mới (chưa gửi) của ngày hôm qua để tổng hợp.');
                return;
            }

            Log::info('Số lượng bản ghi chưa gửi của ngày hôm qua được lấy: ' . $data->count());

            $fileName = 'danh_sach_dich_vu_' . $yesterday->format('Y-m-d') . '.xlsx';
            $filePath = storage_path('app/public/' . $fileName);

            Excel::store(new ServiceMailsExport($query), $fileName, 'public');
            Log::info('File Excel chứa dữ liệu chưa gửi của ngày hôm qua đã được tạo: ' . $filePath);

            $adminEmail = config('mail.admin_email', 'votanluon194@gmail.com');
            Mail::to($adminEmail)->send(new DailyServiceMailSummary($filePath, $yesterday));

            $query->update(['is_sent' => self::DA_GUI]);

            Log::info('Đã gửi email tổng hợp thành công và cập nhật trạng thái.');
        } catch (\Exception $e) {
            Log::error('Lỗi khi gửi email tổng hợp: ' . $e->getMessage());
        }
    }
}
