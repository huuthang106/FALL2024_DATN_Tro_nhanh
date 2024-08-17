<?php

namespace App\Services;
// 1 file là 1 model 
use App\Models\Room;
use App\Models\Image;
class RoomClientServices
{
    // viết các hàm lấy giá trị của bản đó 
    public function getAllRoom(int $perPage = 1)
    {
        try {
            // Lấy tất cả các blog từ cơ sở dữ liệu và phân trang
            return Room::where('status', 1)->paginate($perPage);
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return null;
        }
    }
    public function getRoomWhere()
    {
        $rooms = Room::orderBy('created_at', 'desc')->take(5)->get();
        return $rooms;
    }

    public function getSlugRoom($slug)
    {
        $rooms = Room::where('Slug', $slug)->first();
        return $rooms;
    }
}