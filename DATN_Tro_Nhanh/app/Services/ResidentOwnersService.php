<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Resident;
use Illuminate\Support\Facades\Log;
use App\Events\TenantRemoved;
use App\Events\ResidentDeleted;
use Illuminate\Support\Facades\Redirect;
use App\Events\ApplicationRefused;
use App\Events\OrderCancelled;
// use Illuminate\Support\Facades\Log;

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
    // event(new ResidentDeleted($resident, $content));

    // Xóa resident
    $resident->delete();

    return true; // Trả về true nếu xóa thành công
}
    

    public function getmyResdent($user_id)
    {
        return Resident::where('tenant_id', $user_id)
            // ->where('status', 2) // Chỉ lấy các bản ghi có status = 2
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    

    public function cancel_order($residentId, $userId)
    {
        try {
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

            // Phát sự kiện thông báo
            event(new OrderCancelled($resident, $userId));

            return true; // Trả về true nếu xóa thành công
        } catch (\Exception $e) {
            Log::error('Không thể thu hồi đơn: ' . $e->getMessage());
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    public function refuseApplication($residentId, $reasons, $note)
{
    try {
        // Tìm resident dựa trên ID
        $resident = Resident::findOrFail($residentId);

        // Nối lý do từ mảng thành chuỗi
        $reasonsString = implode(', ', $reasons);

        // Cập nhật cột 'description' với lý do và ghi chú
        $resident->description = $reasonsString . ($note ? " - Ghi chú: $note" : '');

        // Cập nhật status thành 2 (giả sử 2 là trạng thái từ chối)
        $resident->status = 2;
        $resident->save();

        // Phát sự kiện
        event(new ApplicationRefused($resident, $reasons, $note));

        return true;
    } catch (\Exception $e) {
        Log::error('Failed to refuse application: ' . $e->getMessage());
        return false;
    }
}

}
