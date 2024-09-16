<?php
// <!-- bên trong đây tạo ra các file tương ứng với các bảng để lấy dữ liệu  -->
// đây chỉ là file mẫu mọi người tự tạo ra các file khác ko dùng file này 
namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Contact;

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
        ->leftJoin('comments', 'users.id', '=', 'comments.user_id') // Join bảng comments với bảng users để lấy rating
        ->select('users.*') // Chọn tất cả các cột từ bảng users
        ->selectRaw('COUNT(rooms.id) as rooms_count') // Đếm số lượng room cho mỗi user
        ->selectRaw('comments.rating as user_rating') // Lấy rating trực tiếp từ bảng comments
        ->groupBy('users.id', 'comments.rating') // Nhóm theo id người dùng và rating
        ->orderBy('has_vip_badge', 'desc') // Sắp xếp ưu tiên theo VIP (1 trước, 0 sau)
        ->orderBy('user_rating', 'desc') // Sắp xếp theo rating trực tiếp từ cao đến thấp
        ->orderBy('rooms_count', 'desc') // Sau đó sắp xếp theo số lượng room giảm dần
        ->orderBy('users.created_at', 'desc'); // Cuối cùng sắp xếp theo ngày tạo giảm dần
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
    // public function getUsersByRole2($role, $searchTerm = null, $limit)
    // {
    //     // Khởi tạo query để lọc người dùng theo vai trò
    //     $query = User::where('role', $role);

    //     // Nếu có từ khóa tìm kiếm, thêm điều kiện tìm kiếm
    //     if ($searchTerm) {
    //         $query->where(function ($q) use ($searchTerm) {
    //             $q->where('name', 'like', '%' . $searchTerm . '%')
    //               ->orWhere('email', 'like', '%' . $searchTerm . '%');
    //         });
    //     }

    //     // Trả về kết quả phân trang
    //     return $query->paginate($limit);
    // }





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

    public function getUnreadMessagesCount($userId)
    {
        return Message::whereHas('contact', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhere('contact_user_id', $userId);
        })
        ->where('sender_id', '!=', $userId)
        ->where('is_read', false)
        ->count();
    }
}   
