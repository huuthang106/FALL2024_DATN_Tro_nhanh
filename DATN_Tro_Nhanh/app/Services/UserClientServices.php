<?php
// <!-- bên trong đây tạo ra các file tương ứng với các bảng để lấy dữ liệu  -->
// đây chỉ là file mẫu mọi người tự tạo ra các file khác ko dùng file này 
namespace App\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;

class UserClientServices
{
     /**
     * Lấy thông tin chi tiết của người dùng theo ID.
     *
     * @param int $id
     * @return \App\Models\User|null
     */
    /**
     * Lấy danh sách người dùng có role = 2 với phân trang.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getUsersByRole($role)
    {
       
        return User::where('role', $role)->paginate(8);
    }
    public function getUserBySlug($slug)
    {
        return User::where('slug', $slug)->first();
    }
    public function changePassword(UpdatePasswordRequest $request): void
    {
        $validated = $request->validated();

        // Cập nhật mật khẩu của người dùng hiện tại
        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);
    }
    
    
}
