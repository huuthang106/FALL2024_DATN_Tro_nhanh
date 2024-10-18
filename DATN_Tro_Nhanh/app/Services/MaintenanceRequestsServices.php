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
use Illuminate\Database\Eloquent\ModelNotFoundException;


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



    public function softDeleteMaintenances($id)
    {
        $Maintenance = MaintenanceRequest::findOrFail($id);
        $Maintenance->delete();
        return $Maintenance;
    }

    public function getTrashedMaintenances()
    {
        return MaintenanceRequest::onlyTrashed()->get();
    }

    public function restoreMaintenances($id)
    {
        $Maintenance = MaintenanceRequest::withTrashed()->findOrFail($id);
        $Maintenance->restore();
        return $Maintenance;
    }
    public function store($request,$user_id){
        $maintenanceRequest = MaintenanceRequest::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $user_id, // Gán user_id cho yêu cầu
            'room_id'=> $request->input('room_id'),
            'status' => 1,
        ]);
    
        return $maintenanceRequest;
    }

    public function editStatus($id,$status)
    {
        try {
            // Tìm yêu cầu bảo trì theo ID
            $maintenanceRequest = MaintenanceRequest::findOrFail($id);
            
            // Cập nhật các trường dữ liệu
            $maintenanceRequest->update(['status' => $status]);
            
            // Trả về true nếu cập nhật thành công
            return true;
        } catch (ModelNotFoundException $e) {
            // Xử lý trường hợp không tìm thấy bản ghi
            return false; // Hoặc bạn có thể ném ra một ngoại lệ khác
        } catch (\Exception $e) {
            // Xử lý các lỗi khác nếu cần
            return false;
        }
    }
}



 