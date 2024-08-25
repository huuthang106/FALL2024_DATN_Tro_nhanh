<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\BlogCreated;
use Illuminate\Support\Facades\DB;


class MaintenanceRequestsServices
{
    public function getAllMaintenanceRequests($roomId = null)
    {
        $query = MaintenanceRequest::query();
    
        $userId = Auth::id();
    
        // Lọc theo roomId nếu có và kiểm tra room_id có thuộc sở hữu của user đang đăng nhập
        if ($roomId) {
            $query->where('room_id', $roomId)
                  ->whereHas('room', function ($roomQuery) use ($userId) {
                      $roomQuery->where('user_id', $userId);
                  });
        } else {
            // Nếu không có roomId, chỉ lấy các đơn bảo trì liên quan đến các phòng mà user sở hữu
            $query->whereHas('room', function ($roomQuery) use ($userId) {
                $roomQuery->where('user_id', $userId);
            });
        }
        $maintenanceRequests = $query->paginate(8);
    
        return $maintenanceRequests;
    }
    public function countTotalMaintenanceRequests()
    {
        $userId = Auth::id();

        // Đếm tổng số yêu cầu sửa chữa liên quan đến các phòng mà người dùng sở hữu
        $count = MaintenanceRequest::whereHas('room', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        return $count;
    }
   // Trong MaintenanceService hoặc dịch vụ phù hợp


    
    
    
}

 

