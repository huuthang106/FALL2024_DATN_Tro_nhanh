<?php

namespace App\Services;
// 1 file là 1 model 
use App\Models\Room;
use App\Models\Image;
class RoomClientServices
{
    // viết các hàm lấy giá trị của bản đó 
    public function getRoomWhere()
    {
        $rooms = Room::orderBy('created_at', 'desc')->take(5)->get();
        return $rooms;
    }
}