<?php

namespace App\Services;

use App\Models\Resident;
use Exception;

class ResidentService
{
    protected const processing = 1;
    public function storeResident($data, $tenant_id, $owner_id,$deposit)
    {
        try {
            // Tạo thông tin cư dân mới mà không kiểm tra sự tồn tại
            $resident = Resident::create([
                'tenant_id' => $tenant_id,
                'user_id' => $owner_id,
                'room_id' => $data['room_id'],
                'status' => 1,
                'deposit' => $deposit,
            ]);

            return $resident;
        } catch (Exception $e) {
            // Xử lý lỗi và ném ra thông báo
            throw new Exception(" " . $e->getMessage());
        }
    }
    public function check_resident($roomId){
        return Resident::where('room_id', $roomId)->where('status', self::processing)->exists();
    }
}
