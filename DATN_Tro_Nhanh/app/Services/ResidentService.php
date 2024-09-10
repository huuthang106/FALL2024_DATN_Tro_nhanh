<?php
namespace App\Services;

use App\Models\Resident; 
use Exception;

class ResidentService
{
    public function storeResident($data, $tenant_id)
{
    try {
        // Kiểm tra sự tồn tại của cư dân với cùng user_id, room_id và zone_id
        $existingResident = Resident::where('user_id', $data['user_id'])
            ->where('room_id', $data['room_id'])
            ->where('zone_id', $data['zone_id'])
            ->first();

        if ($existingResident) {
            // Nếu cư dân đã tồn tại, ném lỗi
            throw new Exception("Bạn đã đăng ký khu trọ khác");
        }

        // Tạo thông tin cư dân mới
        $resident = Resident::create([
            'tenant_id' =>  $tenant_id,
            'user_id'=> $data['user_id'],
            'room_id' => $data['room_id'],
            'zone_id' => $data['zone_id'],
        ]);

        return $resident;
    } catch (Exception $e) {
        // Xử lý lỗi và ném ra thông báo
        throw new Exception(" " . $e->getMessage());
    }
}

}
