<?php

namespace App\Services;

use App\Models\ServiceMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServiceMailsExport;
use App\Mail\ServiceMailNotification;
use Illuminate\Support\Facades\Log;

class ServiceMailService
{
    const CHUA_GUI = 0;
    const DA_GUI = 1;
    // public function sendEmail()
    // {
    //     $data = ServiceMail::where('is_sent', self::CHUA_GUI)
    //         ->where('created_at', '>=', now()->subMinute())
    //         ->get();
    //     // Kiểm tra nếu không có dữ liệu để gửi email
    //     if ($data->isEmpty()) {
    //         return;
    //     }
    //     // Lấy email admin từ .env
    //     $adminEmail = env('ADMIN_EMAIL', 'votanluon194@gmail.com');
    //     // Gửi email đến admin với tệp đính kèm
    //     Mail::to($adminEmail)->send(new ServiceMailNotification($data));
    //     // Send email to admin with attachment
    //     // Mail::to('votanluon194@gmail.com')->send(new \App\Mail\ServiceMailNotification($data));

    //     // Cập nhật các bản ghi đã gửi để đặt `is_sent` thành true
    //     ServiceMail::whereIn('id', $data->pluck('id'))->update(['is_sent' => self::DA_GUI]);
    // }

    public function store(array $validatedData)
    {
        $serviceMail = ServiceMail::create($validatedData);

        // Đặt lịch gửi mail
        dispatch(function () {
            sleep(30); // Chờ 30 giây
            $this->sendEmail();
        });
        // Đặt lịch gửi mail sau 24 giờ
        // dispatch(function () {
        //     $this->sendEmail();
        // })->delay(now()->addDay());

        return $serviceMail;
    }

    public function sendEmail()
    {
        try {
            // Log::info('Bắt đầu hàm sendEmail');

            // $query = ServiceMail::where('is_sent', self::CHUA_GUI)
            //     ->orderBy('created_at', 'asc');

            // Log::info('SQL Query: ' . $query->toSql());
            // Log::info('Query Bindings: ' . json_encode($query->getBindings()));

            // $data = $query->get();

            // Log::info('Số lượng bản ghi tìm thấy: ' . $data->count());
            Log::info('Bắt đầu hàm sendEmail');

            $query = ServiceMail::where('is_sent', self::CHUA_GUI)
                ->where('created_at', '<=', now()->subHours(24))
                ->orderBy('created_at', 'asc');

            Log::info('SQL Query: ' . $query->toSql());
            Log::info('Query Bindings: ' . json_encode($query->getBindings()));

            $data = $query->get();

            Log::info('Số lượng bản ghi tìm thấy: ' . $data->count());
            // Kiểm tra nếu không có dữ liệu để gửi email
            if ($data->isEmpty()) {
                Log::info('Không có email mới để gửi.');
                return;
            }

            // Giới hạn số lượng bản ghi để gửi trong một lần (để tránh quá tải)
            $chunkSize = 100; // Bạn có thể điều chỉnh số này tùy theo nhu cầu
            $chunks = $data->chunk($chunkSize);

            foreach ($chunks as $chunk) {
                // Tạo file Excel cho mỗi chunk
                $fileName = 'service_mails_' . now()->format('Y-m-d_H-i-s') . '.xlsx';
                $filePath = storage_path('app/public/' . $fileName);
                Excel::store(new ServiceMailsExport($chunk), $fileName, 'public');

                // Lấy email admin từ config
                $adminEmail = config('mail.admin_email', 'votanluon194@gmail.com');

                // Gửi email đến admin với tệp đính kèm
                Mail::to($adminEmail)->send(new ServiceMailNotification($chunk, $filePath));

                // Cập nhật các bản ghi đã gửi để đặt `is_sent` thành DA_GUI
                ServiceMail::whereIn('id', $chunk->pluck('id'))->update(['is_sent' => self::DA_GUI]);

                Log::info('Đã gửi email báo cáo với ' . $chunk->count() . ' bản ghi.');

                // Tạm dừng một chút giữa các lần gửi để tránh quá tải
                sleep(5); // Tạm dừng 5 giây, bạn có thể điều chỉnh thời gian này
            }
        } catch (\Exception $e) {
            Log::error('Lỗi khi gửi email báo cáo: ' . $e->getMessage());
        }
    }
}
