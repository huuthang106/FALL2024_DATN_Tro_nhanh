<?php
// <!-- bên trong đây tạo ra các file tương ứng với các bảng để lấy dữ liệu  -->
// đây chỉ là file mẫu mọi người tự tạo ra các file khác ko dùng file này 
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use App\Models\Room;

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
    public function getUsersByRole($role, $searchTerm = null, $limit, $province = null, $district = null, $village = null)
{
    // Khởi tạo query để lọc người dùng theo vai trò
    $query = User::where('role', $role)
        ->leftJoin('rooms', 'users.id', '=', 'rooms.user_id') // Join bảng rooms với bảng users
        ->select('users.*') // Chọn tất cả các cột từ bảng users
        ->selectRaw('COUNT(rooms.id) as rooms_count') // Đếm số lượng room cho mỗi user
        ->groupBy('users.id') // Nhóm theo id người dùng để tính số lượng room
        ->orderBy('rooms_count', 'desc') // Sắp xếp theo số lượng room giảm dần
        ->orderBy('users.created_at', 'desc'); // Sau đó sắp xếp theo ngày tạo giảm dần

    // Nếu có từ khóa tìm kiếm, thêm điều kiện tìm kiếm
    if ($searchTerm) {
        $query->where(function ($q) use ($searchTerm) {
            $q->where('users.name', 'like', '%' . $searchTerm . '%')
              ->orWhere('users.email', 'like', '%' . $searchTerm . '%');
        });
    }

    // Nếu có tỉnh, huyện, xã, thêm điều kiện lọc theo địa lý
    if ($province || $district || $village) {
        $query->where(function ($q) use ($province, $district, $village) {
            if ($province) {
                $q->where('users.province', $province);
            }

            if ($district) {
                $q->where('users.district', $district);
            }

            if ($village) {
                $q->where('users.village', $village);
            }
        });
    }

    // Trả về kết quả phân trang
    return $query->paginate($limit);
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
