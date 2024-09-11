<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Resident;
use App\Events\TenantRemoved;

class ResidentOwnersService
{
    public function getlistResdent($user_id, $status)
    {
        return Resident::where('user_id', $user_id)
            ->where('status', $status)
            ->with('tenant')
            ->orderBy('created_at', 'desc') // Nạp thông tin người dùng liên quan (nếu cần)
            ->paginate(10);
    }

    public function updateResidentStatus($residentId, $newStatus, $userId)
    {
        // Tìm resident theo ID và user_id
        $resident = Resident::where('id', $residentId)
            ->where('user_id', $userId)
            ->first();

        // Kiểm tra xem resident có tồn tại không
        if (!$resident) {
            throw new \Exception('Resident không tồn tại hoặc không thuộc về bạn.');
        }

        // Cập nhật status
        $resident->status = $newStatus;
        $resident->save();

        return $resident; // Trả về resident đã được cập nhật
    }
    public function deleteResident($residentId, $userId, $content)
    {
        // Tìm resident theo ID và user_id
        $resident = Resident::where('id', $residentId)
            ->where('user_id', $userId)
            ->first();

        // Kiểm tra xem resident có tồn tại không
        if (!$resident) {
            throw new \Exception('Resident không tồn tại hoặc không thuộc về bạn.');
        }


        // Phát sự kiện trước khi xóa
        event(new TenantRemoved($resident, $content));

        // Xóa resident
        $resident->delete();

        return true; // Trả về true nếu xóa thành công
    }

    public function getmyResdent($user_id, $status)
    {
        return Resident::where('tenant_id', $user_id)
            ->where('status', $status)->orderBy('created_at', 'desc')->paginate(10);
          
    }

    public function cancel_order($residentId, $userId)
    {
        // Tìm resident theo ID và user_id
        $resident = Resident::where('id', $residentId)
            ->where('tenant_id', $userId)
            ->first();

        // Kiểm tra xem resident có tồn tại không
        if (!$resident) {
            throw new \Exception('Resident không tồn tại hoặc không thuộc về bạn.');
        }



        // Xóa resident
        $resident->delete();

        return true; // Trả về true nếu xóa thành công
    }
}
