<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class RoomServices
{
    public function getAllRooms(int $perPage = 10)
    {
        try {
            return Room::paginate($perPage);
        } catch (\Exception $e) {
            Log::error('Không thể lấy danh sách phòng: ' . $e->getMessage());
            return null;
        }
    }
  // DATN_Tro_Nhanh/app/Services/RoomServices.php
public function updateQuantity($id, $quantity)
{
    // Lấy phòng theo ID
    $room = Room::find($id);

    if ($room) {
        // Tính toán số lượng mới
        $newQuantity = $room->quantity - $quantity;

        // Kiểm tra xem số lượng mới có nhỏ hơn 1 không
        if ($newQuantity < 1) {
            return false; // Trả về false nếu số lượng nhỏ hơn 1
        }

        // Cập nhật số lượng mới
        $room->quantity = $newQuantity;

        // Lưu thay đổi vào cơ sở dữ liệu
        $room->save();

        return true; // Trả về true nếu cập nhật thành công
    }

    return false; // Trả về false nếu không tìm thấy phòng
}
    public function getRoomPrice($id){
        return Room::find($id);
    }
}
