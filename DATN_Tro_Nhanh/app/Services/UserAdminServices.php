<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
 class UserAdminServices{
    private const vaitronguoidung = 1;
    private const vaitroadmin = 0;
    private const vaitrochutro = 2;
    public function updateRole($id, $role){
        $user = User::find($id);
        if($user){
            $user->role = $role;
            $user->save();
            return true;
        }
        return false;
    }
    public function getUserRole(int $perPage = 10)
    {
        try {
            return User::where('role',self::vaitronguoidung)->paginate($perPage);
        } catch (\Exception $e) {
            Log::error('Không thể lấy danh sách phòng: ' . $e->getMessage());
            return null;
        }
    }

    public function updateRoleAdmin($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->role = '0'; // Cập nhật vai trò thành admin (hoặc một vai trò khác)
            $user->save();
        }
    }
    
    public function updateRoleUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->role = '2'; // Cập nhật vai trò thành 2 (hoặc bất kỳ vai trò nào)
            $user->save();
        }
    }
 }