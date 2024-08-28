<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomClientServices
{
    // viết các hàm lấy giá trị của bản đó 
    private const status = 1;
    public function getAllRoom(int $perPage = 10, $searchTerm = null, $province = null, $district = null, $village = null)
    {
        try {
            $query = Room::where('status', self::status);

            // Nếu có từ khóa tìm kiếm, thêm điều kiện vào truy vấn
            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('address', 'like', '%' . $searchTerm . '%');
                });
            }

            // Nếu có tỉnh, huyện, xã, thêm điều kiện vào truy vấn
            if ($province) {
                $query->where('province', $province);
            }
            if ($district) {
                $query->where('district', $district);
            }
            if ($village) {
                $query->where('village', $village);
            }

            return $query->paginate($perPage);
        } catch (\Exception $e) {
            return null;
        }
    }

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
    public function addFavourite($userId, $roomId)
    {
        // Kiểm tra xem phòng đã có trong danh sách yêu thích chưa
        $existingFavourite = Favourite::where('user_id', $userId)
            ->where('room_id', $roomId)
            ->first();

        if ($existingFavourite) {
            return response()->json([
                'success' => false,
                'message' => 'Phòng này đã có trong danh sách yêu thích'
            ]);
        }

        // Thêm mới vào danh sách yêu thích
        Favourite::create([
            'user_id' => $userId,
            'room_id' => $roomId,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thêm vào danh sách yêu thích thành công'
        ]);
    }
    public function getRoomCount($userId = null)
    {
        // Nếu userId không có hoặc NULL sẽ auth()->id();
        $userId = $userId ?? auth()->id();
        return Room::where('user_id', $userId)->count();
    }
}
