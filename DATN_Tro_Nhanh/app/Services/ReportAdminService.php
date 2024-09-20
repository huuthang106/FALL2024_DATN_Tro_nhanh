<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Report;
use Illuminate\Support\Facades\Log;
use App\Events\ImagesUploaded;
use Illuminate\Support\Facades\Auth;

class ReportAdminService
{
    // public function getUserReports($userId, $perPage = 8)
    // {
    //     return Report::with(['room', 'user'])
    //         ->where('user_id', $userId)
    //         ->paginate($perPage); // Số lượng bản ghi trên mỗi trang
    // }
    public function getUserReports($perPage = 8)
    {
        return Report::with(['room', 'user'])
            ->select('reports.*', 'users.name as user_name', 'rooms.title as room_title')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->leftJoin('rooms', 'reports.room_id', '=', 'rooms.id')
            ->orderBy('reports.created_at', 'desc')
            ->paginate($perPage);
    }

    // Hàm thay đổi trạng thái báo cáo
    // ReportService.php
    public function approveReport($reportId)
    {
        $report = Report::findOrFail($reportId);
        $report->status = 2; // Thay đổi trạng thái từ 1 (Chưa duyệt) thành 2 (Đã duyệt)
        $report->save();

        return $report;
    }
}
