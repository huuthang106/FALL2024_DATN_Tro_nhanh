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
        if ($room->quantity < $quantity) {
            return false; // Trả về false nếu số lượng không đủ
        }
        $newQuantity = $room->quantity - $quantity;

        // Kiểm tra xem số lượng mới có nhỏ hơn 1 không
       

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
    public function checkQuantity($room_id, $quantity)
    {
        // Truy vấn đến bảng rooms để lấy số lượng phòng
        $room = Room::find($room_id); // Giả sử bạn đã import model Room

        // Kiểm tra xem phòng có tồn tại không
        if (!$room) {
            return false; // Trả về lỗi nếu phòng không tồn tại
        }

        // Lấy số lượng phòng có sẵn từ bản ghi
        $availableQuantity = $room->quantity; // Giả sử trường quantity trong bảng rooms là quantity

        // So sánh số lượng phòng có sẵn với số lượng yêu cầu
        if ($availableQuantity < $quantity) {
            return false; // Không đủ phòng
        }

        return true; // Đủ phòng
    }
}
