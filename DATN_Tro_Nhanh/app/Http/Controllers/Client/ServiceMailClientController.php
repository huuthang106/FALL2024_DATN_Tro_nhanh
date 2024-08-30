<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceMailRequest;
use App\Services\ServiceMailService;
use App\Models\ServiceMail;

class ServiceMailClientController extends Controller
{
    //
    protected $serviceMailService;

    public function __construct(ServiceMailService $serviceMailService)
    {
        $this->serviceMailService = $serviceMailService;
    }

    // public function store(ServiceMailRequest $request)
    // {
    //     // Lưu dữ liệu vào bảng service_mails
    //     ServiceMail::create($request->validated());

    //     // Đặt lịch gửi mail
    //     dispatch(function () {
    //         sleep(30); // Chờ 1 phút
    //         $this->serviceMailService->sendEmail();
    //     });

    //     // return response()->json(['message' => 'Form submitted successfully']);
    //     return redirect()->back()->with('success', 'Form submitted successfully.');
    // }

    public function store(ServiceMailRequest $request)
    {
        // Lưu dữ liệu và đặt lịch gửi mail
        $this->serviceMailService->store($request->validated());

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
}
