<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceMailRequest;
use App\Services\ServiceMailService;

class ServiceMailClientController extends Controller
{
    protected $serviceMailService;

    public function __construct(ServiceMailService $serviceMailService)
    {
        $this->serviceMailService = $serviceMailService;
    }

    public function store(ServiceMailRequest $request)
    {
        $this->serviceMailService->store($request->validated());
        return response()->json(['message' => 'Yêu cầu của bạn đã được ghi nhận và sẽ được xử lý trong báo cáo tổng hợp tiếp theo.']);
    }
}
