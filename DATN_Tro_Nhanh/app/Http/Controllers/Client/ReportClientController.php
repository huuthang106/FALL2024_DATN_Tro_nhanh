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

        // if (!auth()->check()) {
        //     return redirect()->route('login');
        // }

        return view('client.create.create-report', compact('room'));
    }
    public function show_create_report_zone($slug)
    {
        $zone = $this->reportService->getZoneBySlug($slug);

        // if (!auth()->check()) {
        //     return redirect()->route('login');
        // }

        return view('client.create.create-report', compact('zone'));
    }
    public function store_zone(ReportRequest $request)
    {
        // Gọi service để xử lý lưu trữ báo cáo
        $this->reportService->createReportZone($request->validated());
        return redirect()->route('client.client-list-zone')->with('success', 'Báo cáo của bạn đã được gửi thành công. Chúng tôi sẽ xem xét và phản hồi sớm nhất có thể.');
    }
    public function store_room(ReportRequest $request)
    {
        // Gọi service để xử lý lưu trữ báo cáo
        $this->reportService->createReportRoom($request->validated());
        return redirect()->route('client.room-listing')->with('success', 'Báo cáo của bạn đã được gửi thành công. Chúng tôi sẽ xem xét và phản hồi sớm nhất có thể.');
    }
}
