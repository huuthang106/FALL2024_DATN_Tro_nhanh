<?php

namespace App\Services;

use App\Models\Premium;
use App\Models\User;
use Carbon\Carbon;

class PremiumService
{
    public function updateStatusAndRemoveExpiredPremiumUsers()
    {
        // Lấy ngày hiện tại
        $currentDate = Carbon::now();

        // Tìm những user trong bảng Premium mà đã hết hạn VIP
        $expiredPremiums = Premium::where('end_day', '<=', $currentDate)->get();

        $updatedCount = 0;

        if ($expiredPremiums->isNotEmpty()) {
            foreach ($expiredPremiums as $premium) {
                // Tìm user liên quan trong bảng users
                $user = User::find($premium->user_id);
                
                if ($user) {
                    // Cập nhật has_vip_badge thành false và vip_expiration_date thành null
                    $user->has_vip_badge = false;
                    $user->vip_expiration_date = null;
                    $user->save();

                    $updatedCount++;
                }

                // Xóa user đã hết hạn khỏi bảng premium
                $premium->delete();
            }
        }

        return $updatedCount; // Trả về số lượng user đã cập nhật và xóa
    }
}
