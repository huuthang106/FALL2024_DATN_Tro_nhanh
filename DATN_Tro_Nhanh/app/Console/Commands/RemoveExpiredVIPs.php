<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Premium;

class RemoveExpiredVIPs extends Command
{
    protected $signature = 'vip:remove-expired';
    protected $description = 'Remove expired VIPs from users';

    public function handle()
    {
        $now = now();

        // Lấy tất cả người dùng có gói VIP đã hết hạn
        $users = User::where('has_vip_badge', true)
            ->where('vip_expiration_date', '<=', $now)
            ->get();

        foreach ($users as $user) {
            // Cập nhật trạng thái VIP của người dùng
            $user->has_vip_badge = false;
            $user->save();

            // Xóa dữ liệu trong bảng premium
            Premium::where('user_id', $user->id)->delete();
        }

        $this->info('Expired VIPs have been removed successfully.');
    }
}
