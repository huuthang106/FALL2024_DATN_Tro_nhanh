<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReportAdminService;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Illuminate\Support\Facades\Log;

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
    public function show($id)
    {
        $report = Report::with(['user', 'room'])->findOrFail($id);
        return response()->json($report);
    }
    // Hàm thay đổi trạng thái báo cáo
    // ReportController.php
    public function approve($reportId)
    {
        try {
            $result = $this->reportService->approveReport($reportId);

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Báo cáo đã được duyệt.',
                    'redirect' => route('admin.show-report')
                ]);
            }

            return redirect()->route('admin.show-report')->with('success', 'Báo cáo đã được duyệt.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
