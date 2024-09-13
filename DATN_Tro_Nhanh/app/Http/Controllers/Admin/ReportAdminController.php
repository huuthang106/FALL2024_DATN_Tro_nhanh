<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReportAdminService;
use Illuminate\Support\Facades\Auth;

class ReportAdminController extends Controller
{
    protected $reportService;

    public function __construct(ReportAdminService $reportService)
    {
        $this->reportService = $reportService;
    }

    // Hàm lấy tất cả báo cáo của user hiện tại
    public function index()
    {
        $userId = Auth::id();


        $reports = $this->reportService->getUserReports($userId);

        return view('admincp.show.show-report', compact('reports'));
    }

    // Hàm thay đổi trạng thái báo cáo
    // ReportController.php
    public function approve($reportId)
    {
        $this->reportService->approveReport($reportId);

        return redirect()->route('admin.show-report')->with('success', 'Báo cáo đã được duyệt.');
    }

}
