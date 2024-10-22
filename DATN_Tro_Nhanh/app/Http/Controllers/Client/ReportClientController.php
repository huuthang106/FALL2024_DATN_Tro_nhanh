<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReportClientService;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Log;

class ReportClientController extends Controller
{
    //
    protected $reportService;

    public function __construct(ReportClientService $reportService)
    {
        $this->reportService = $reportService;
    }
    public function show_create_report_room($slug)
    {
        $room = $this->reportService->getRoomBySlug($slug);
        return view('client.create.create-report', compact('room'));
    }
    public function show_create_report_zone($slug)
    {
        $zone = $this->reportService->getZoneBySlug($slug);
        return view('client.create.create-report', compact('zone'));
    }
    // public function store_zone(ReportRequest $request)
    // {
    //     // Gọi service để xử lý lưu trữ báo cáo
    //     $this->reportService->createReportZone($request->validated());
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Báo cáo của bạn đã được gửi thành công. Chúng tôi sẽ xem xét và phản hồi sớm nhất có thể.',
    //         'redirect' => url()->previous()
    //     ]);
    // }
    public function store_zone(ReportRequest $request)
    {
        try {
            // Gọi service để xử lý lưu trữ báo cáo
            $this->reportService->createReportZone($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Báo cáo của bạn đã được gửi thành công. Chúng tôi sẽ xem xét và phản hồi sớm nhất có thể.',
                'redirect' => url()->previous()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
    }
    public function store_room(ReportRequest $request)
    {
        // Gọi service để xử lý lưu trữ báo cáo
        $this->reportService->createReportRoom($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Báo cáo của bạn đã được gửi thành công. Chúng tôi sẽ xem xét và phản hồi sớm nhất có thể.',
            'redirect' => url()->previous()
        ]);
    }
}
