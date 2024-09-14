<?php

namespace App\Services;

use App\Models\User;
use App\Models\AccountLock;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class UserAdminServices
{
    private const vaitronguoidung = 1;
    private const vaitroadmin = 0;
    private const vaitrochutro = 2;
    private const taikhoanhanche = 3;

    public function updateRole($id, $role)
    {
        $user = User::find($id);
        if ($user) {
            $user->role = $role;
            $user->save();
            return true;
        }
        return false;
    }
    public function getUserRole(int $perPage = 10)
    {
        try {
            return User::where('role', self::vaitronguoidung)->paginate($perPage);
        } catch (\Exception $e) {
            Log::error('Không thể lấy danh sách phòng: ' . $e->getMessage());
            return null;
        }
    }

    public function updateRoleAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $currentDate = now(); // Ngày hiện tại
            $lockUntil = $currentDate->addDays($days)->setTime(23, 59, 59); // Cộng thêm số ngày khóa và đặt giờ kết thúc là 23:59:59
            $user->role = self::vaitroadmin; // Cập nhật vai trò thành admin (hoặc một vai trò khác)
            $user->save();
        }
    }

    public function updateRoleUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->role = self::vaitrochutro; // Cập nhật vai trò thành 2 (hoặc bất kỳ vai trò nào)
            $user->save();
        }
    }

    public function lockAccount($request, $userId)
    {
        $user = User::find($userId);
        $blockDays = (int) $request->input('blockDays');
        $blockReason = $request->input('blockReason');

        // Kiểm tra xem user đã có trong bảng AccountLock hay chưa
    $lock = AccountLock::where('user_id', $user)->first();

    if ($lock) {
        // Nếu user đã bị khóa, cộng thêm số ngày khóa vào ngày hết hạn hiện tại
        $currentLockUntil = $lock->lock_until > now() ? $lock->lock_until : now();
        $newLockUntil = $currentLockUntil->addDays($blockDays)->setTime(23, 59, 59);

        // Cập nhật ngày hết hạn khóa và lý do khóa
        $lock->lock_until = $newLockUntil;
        $lock->lock_reason = $blockReason;
        $lock->save();
    } else {
        // Nếu user chưa bị khóa, tạo mới bản ghi trong bảng AccountLock
        $newLockUntil = now()->addDays($blockDays)->setTime(23, 59, 59);

        // Tạo mới thông tin khóa
        AccountLock::create([
            'user_id' => $userId,
            'lock_until' => $newLockUntil,
            'lock_reason' => $blockReason,
        ]);
    }
    $user->status = 3; // Status = 3: Tài khoản bị khóa
    $user->save();
    }
}
