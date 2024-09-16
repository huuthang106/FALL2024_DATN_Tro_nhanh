<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomClientServices
{
    // viết các hàm lấy giá trị của bản đó 
    private const trangthaiphong = 2;
    private const status = 2;
    // public function getAllRoom(int $perPage = 10, $searchTerm = null, $province = null, $district = null, $village = null)
    // {
    //     try {
    //         // $query = Room::where('status', self::status);
    //         $query = Room::where('status', self::status)
    //             ->withCount('images'); // Đếm số lượng ảnh liên quan đến mỗi phòng
    //         // Nếu có từ khóa tìm kiếm, thêm điều kiện vào truy vấn
    //         if ($searchTerm) {
    //             $query->where(function ($q) use ($searchTerm) {
    //                 $q->where('title', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('description', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('address', 'like', '%' . $searchTerm . '%');
    //             });
    //         }

    //         // Nếu có tỉnh, huyện, xã, thêm điều kiện vào truy vấn
    //         if ($province) {
    //             $query->where('province', $province);
    //         }
    //         if ($district) {
    //             $query->where('district', $district);
    //         }
    //         if ($village) {
    //             $query->where('village', $village);
    //         }
    //         // Thêm điều kiện sắp xếp theo mới nhất
    //         $query->orderByDesc('created_at');
    //         return $query->paginate($perPage);
    //     } catch (\Exception $e) {
    //         return null;
    //     }
    // }
    // ----------------------------------------------------------------Sắp Theo VIP
    public function getAllRoom(int $perPage = 10, $searchTerm = null, $province = null, $district = null, $village = null)
    {
        try {
            $query = Room::join('users', 'rooms.user_id', '=', 'users.id') // Join bảng rooms và users
                ->where('rooms.status', self::status)
                ->withCount('images') // Đếm số lượng ảnh liên quan đến mỗi phòng
                ->select('rooms.*') // Chọn tất cả các cột từ bảng rooms
                ->orderBy('users.has_vip_badge', 'desc') // Ưu tiên phòng của người dùng có huy hiệu VIP
                ->orderByDesc('rooms.created_at'); // Sắp xếp theo ngày tạo từ mới nhất đến cũ nhất

            // Nếu có từ khóa tìm kiếm, thêm điều kiện vào truy vấn
            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('rooms.title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('rooms.description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('rooms.address', 'like', '%' . $searchTerm . '%');
                });
            }

            // Nếu có tỉnh, huyện, xã, thêm điều kiện vào truy vấn
            if ($province) {
                $query->where('rooms.province', $province);
            }
            if ($district) {
                $query->where('rooms.district', $district);
            }
            if ($village) {
                $query->where('rooms.village', $village);
            }

            return $query->paginate($perPage);
        } catch (\Exception $e) {
            return null;
        }
    }
    // ----------------------------------------------------------------Bổ sung đánh giá
    // public function getAllRoom(int $perPage = 10, $searchTerm = null, $province = null, $district = null, $village = null)
    // {
    //     try {
    //         $query = Room::join('users', 'rooms.user_id', '=', 'users.id') // Join bảng rooms và users
    //             ->leftJoin('comments', 'users.id', '=', 'comments.user_id') // Join với bảng comments để lấy rating
    //             ->where('rooms.status', self::status)
    //             ->withCount('images') // Đếm số lượng ảnh liên quan đến mỗi phòng
    //             ->select('rooms.*') // Chọn tất cả các cột từ bảng rooms
    //             ->selectRaw('AVG(comments.rating) as user_rating') // Lấy trung bình rating của người dùng
    //             ->groupBy('rooms.id', 'users.has_vip_badge', 'users.id') // Nhóm theo id phòng và người dùng
    //             ->orderBy('users.has_vip_badge', 'desc') // Ưu tiên phòng của người dùng có huy hiệu VIP
    //             ->orderByDesc('user_rating') // Sắp xếp theo đánh giá từ cao xuống thấp
    //             ->orderByDesc('rooms.created_at'); // Sắp xếp theo ngày tạo từ mới nhất đến cũ nhất

    //         // Nếu có từ khóa tìm kiếm, thêm điều kiện vào truy vấn
    //         if ($searchTerm) {
    //             $query->where(function ($q) use ($searchTerm) {
    //                 $q->where('rooms.title', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('rooms.description', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('rooms.address', 'like', '%' . $searchTerm . '%');
    //             });
    //         }

    //         // Nếu có tỉnh, huyện, xã, thêm điều kiện vào truy vấn
    //         if ($province) {
    //             $query->where('rooms.province', $province);
    //         }
    //         if ($district) {
    //             $query->where('rooms.district', $district);
    //         }
    //         if ($village) {
    //             $query->where('rooms.village', $village);
    //         }

    //         return $query->paginate($perPage);
    //     } catch (\Exception $e) {
    //         return null;
    //     }
    // }
    // Lấy 5 phòng mới nhất
    public function getRoomWhere()
    {
        try {
            $rooms = Room::orderBy('created_at', 'desc')->take(5)->get();
            return $rooms;
        } catch (\Exception $e) {
            return null;
        }
    }

    // Lấy phòng theo slug
    public function getSlugRoom($slug)
    {
        try {
            $room = Room::where('slug', $slug)->first();
            return $room;
        } catch (\Exception $e) {
            return null;
        }
    }

    // Thêm phòng vào danh sách yêu thích
    // public function addFavourite($userId, $roomId)
    // {
    //     // Kiểm tra xem phòng đã có trong danh sách yêu thích chưa
    //     $existingFavourite = Favourite::where('user_id', $userId)
    //         ->where('room_id', $roomId)
    //         ->first();

    //     if ($existingFavourite) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Phòng này đã có trong danh sách yêu thích'
    //         ]);
    //     }

    //     // Thêm mới vào danh sách yêu thích
    //     Favourite::create([
    //         'user_id' => $userId,
    //         'room_id' => $roomId,
    //     ]);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Thêm vào danh sách yêu thích thành công'
    //     ]);
    // }
    public function addFavourite($slug)
    {
        $room = Room::where('slug', $slug)->firstOrFail();
        $user = auth()->user();

        if ($user->favorites()->where('room_id', $room->id)->exists()) {
            $user->favorites()->detach($room->id);
            $status = 'removed';
        } else {
            $user->favorites()->attach($room->id);
            $status = 'added';
        }

        $favoriteCount = $user->favorites()->count();

        return response()->json([
            'status' => $status,
            'favoriteCount' => $favoriteCount
        ]);
    }
    public function getRoomCount($userId = null)
    {
        // Nếu userId không có hoặc NULL sẽ auth()->id();
        $userId = $userId ?? auth()->id();
        return Room::where('user_id', $userId)->count();
    }
    
    public function getRoomClient($province, $currentRoomId)
{
    return Room::where('status', self::trangthaiphong)
        ->where('province', $province) // Thay 'province' bằng 'province_id' nếu cần
        ->where('id', '<>', $currentRoomId)
        ->get();
}

    
    
}
