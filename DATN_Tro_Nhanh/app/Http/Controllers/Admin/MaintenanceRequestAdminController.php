<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\MaintenanceRequest;
use App\Services\MaintenanceRequestsServices;
use Illuminate\Support\Facades\Log;
use App\Services\NotificationService;

class MaintenanceRequestAdminController extends Controller
{
    //  protected $MaintenanceRequestsServices;
    protected $MaintenanceRequestsServices;

    public function __construct(MaintenanceRequestsServices $MaintenanceRequestsServices)
    {
        $this->MaintenanceRequestsServices = $MaintenanceRequestsServices;
    }
    public function show($roomId = null)
    {
        // Gọi phương thức để lấy yêu cầu bảo trì với hoặc không có roomId
        $maintenanceRequests = $this->MaintenanceRequestsServices->getAllMaintenanceRequests($roomId);
        
        // Truyền dữ liệu đến view
        return view('admincp.show.maintenance', compact('maintenanceRequests'));
    }
}
