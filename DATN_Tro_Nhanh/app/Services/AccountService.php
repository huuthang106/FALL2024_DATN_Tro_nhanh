<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\AccountLock;

class AccountService
{
    public function handleExpiredLocks()
    {
        // Lấy tất cả các khóa tài khoản đã hết hạn
        $expiredLocks = AccountLock::where('lock_until', '<=', Carbon::now())->get();

        foreach ($expiredLocks as $lock) {
            // Cập nhật trạng thái của người dùng
            $user = User::find($lock->user_id);
            if ($user) {
                $user->status = 1; // Cập nhật trạng thái về 1 (hoặc trạng thái bình thường)
                $user->save();
            }

            // Xóa khóa tài khoản đã hết hạn
            $lock->delete();
        }
    }
}
