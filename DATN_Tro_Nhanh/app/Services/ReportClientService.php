<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Report;
use App\Models\Zone;
use Illuminate\Support\Facades\Log;

class ReportClientService
{
    public function getRoomBySlug($slug)
    {
        return Room::where('slug', $slug)->firstOrFail();
    }
    public function getZoneBySlug($slug)
    {
        return Zone::where('slug', $slug)->firstOrFail();
    }
    public function createReportRoom($data)
    {
        return Report::create([
            'description' => $data['description'],
            'status' => $data['status'],
            'user_id' => auth()->id(),
            'room_id' => $data['room_id'],
            'reported_person' => $data['reported_person'],
        ]);
    }
    // public function createReportZone($data)
    // {
    //     return Report::create([
    //         'description' => $data['description'],
    //         'status' => $data['status'],
    //         'user_id' => auth()->id(),
    //         'zone_id' => $data['zone_id'],
    //         'reported_person' => $data['reported_person'],
    //     ]);
    // }
    public function createReportZone($data)
    {
        // Kiểm tra xem người dùng đã báo cáo phòng này trong 24 giờ qua chưa
        $existingReport = Report::where('user_id', auth()->id())
            ->where('zone_id', $data['zone_id'])
            ->where('created_at', '>=', now()->subHours(24))
            ->first();

        if ($existingReport) {
            throw new \Exception('Bạn đã báo cáo phòng này trong 24 giờ qua. Vui lòng đợi trước khi gửi báo cáo mới.');
        }

        // Kiểm tra số lượng báo cáo của người dùng trong ngày
        $reportCount = Report::where('user_id', auth()->id())
            ->whereDate('created_at', today())
            ->count();

        if ($reportCount >= 5) {
            throw new \Exception('Bạn đã đạt giới hạn báo cáo trong ngày. Vui lòng thử lại vào ngày mai.');
        }

        // Nếu không có vấn đề, tạo báo cáo mới
        return Report::create([
            'description' => $data['description'],
            'status' => $data['status'],
            'user_id' => auth()->id(),
            'zone_id' => $data['zone_id'],
            'reported_person' => $data['reported_person'],
        ]);
    }
}
