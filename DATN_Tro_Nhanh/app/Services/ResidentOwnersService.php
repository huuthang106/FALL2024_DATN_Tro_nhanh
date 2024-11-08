<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Resident;
use Illuminate\Support\Facades\Log;
use App\Events\TenantRemoved;
use App\Events\ResidentDeleted;
use Illuminate\Support\Facades\Redirect;
use App\Events\ApplicationRefused;
use App\Events\OrderCancelled;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Notification;
use App\Models\Room;
// use Illuminate\Support\Facades\Log;
use App\Services\RoomOwnersService;

class ResidentOwnersService
{
    public const agree = 2;
    public const leave = 4; //rời khỏi phòng trọ

    public const accepted = 2; // Hoặc giá trị status mà bạn muốn lọc
    public const delete = 4; // status xoa cu dan khoi nha tro 
    public function getlistResdent($user_id, $status)
    {
        return Resident::where('user_id', $user_id)
            ->where('status', $status)
            ->with('tenant')
            ->orderBy('created_at', 'desc') // Nạp thông tin người dùng liên quan (nếu cần)
            ->paginate(10);
    }


    public function updateResidentStatus($residentId, $userId)
    {
        // Tìm resident theo ID và user_id
        $resident = Resident::where('id', $residentId)->first();
        // Kiểm tra xem resident có tồn tại không
        if (!$resident) {
            throw new \Exception('Resident không tồn tại hoặc không thuộc về bạn.');
        }

        // Lấy số tiền đặt cọc của user
        $depositAmount = $resident->deposit; // Giả sử cột này tồn tại

        // Tìm user chủ phòng
        $roomOwner = User::find($resident->user_id); // Giả sử cột này tồn tại

        if (!$roomOwner) {
            throw new \Exception('Chủ phòng không tồn tại.');
        }

        // Cộng số tiền đặt cọc cho user chủ phòng
        $roomOwner->balance += $depositAmount;
        $roomOwner->save();

        $transaction = new Transaction();
        $transaction->user_id = $roomOwner->id;
        $transaction->added_funds = $depositAmount;
        $transaction->balance = $roomOwner->balance;
        $transaction->type = 'Tiền Cọc Phòng';
        $transaction->description = 'Nhận tiền đặt cọc cho ' . $resident->room->title;
        $transaction->save();

        $thonngbao = new Notification();
        $thonngbao->user_id = $resident->tenant_id;
        $thonngbao->type = 'Đơn đã xác nhận';
        $thonngbao->data = 'Đơn tham gia ' . $resident->room->title . ' của bạn đã được duyệt';
        $thonngbao->save();

        // Cập nhật status
        $resident->status = self::agree;
        $resident->save();

        return $resident; // Trả về resident đã được cập nhật
    }
    public function deleteResident($residentId, $userId, $content)
    {
        // Tìm resident theo ID và user_id
        $resident = Resident::where('id', $residentId)
            ->where('user_id', $userId)
            ->first();

        // Kiểm tra xem resident có tồn tại không
        if (!$resident) {
            throw new \Exception('Resident không tồn tại hoặc không thuộc về bạn.');
        }
        
        $room = $resident->room;
   
        // Tao thong bao cho nguoi dung
        $notification = new Notification();
        $notification->user_id = $resident->tenant_id;
        $notification->type = 'Bị xóa khỏi phòng';
        $notification->data = 'Bạn đã bị xóa khỏi phòng ở ' . $room->title;
        $notification->save();

        // Cong lai phong cho phong do 
        $room->quantity += 1;
        $room->save();
        // Phát sự kiện trước khi xóa
        // event(new ResidentDeleted($resident, $content));

        // Xóa thay doi status cho resident
        $resident->status = self::delete;
        $resident->save();

        return true; // Trả về true nếu xóa thành công
    }


    public function getmyResdent($user_id)
    {
        return Resident::where('tenant_id', $user_id)
            // ->where('status', 2) // Chỉ lấy các bản ghi có status = 2
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }


    public function cancel_order($residentId, $userId)
    {
        try {
            // Tìm resident theo ID và user_id
            $resident = Resident::where('id', $residentId)
                ->where('tenant_id', $userId)
                ->first();

            // Kiểm tra xem resident có tồn tại không
            if (!$resident) {
                throw new \Exception('Đơn không tồn tại hoặc không thuộc về bạn.');
            }

            // Xóa resident
            $resident->delete();

            // Phát sự kiện thông báo
            event(new OrderCancelled($resident, $userId));

            return true; // Trả về true nếu xóa thành công
        } catch (\Exception $e) {
            Log::error('Không thể thu hồi đơn: ' . $e->getMessage());
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }
    // Ham tu choi don 
    public function refuseApplication($residentId, $reasons, $note)
    {
        try {
            // Tìm resident dựa trên ID
            $resident = Resident::findOrFail($residentId);

            // Nối lý do từ mảng thành chuỗi
            $reasonsString = implode(', ', $reasons);

            // Cập nhật cột 'description' với lý do và ghi chú
            $resident->description = $reasonsString . ($note ? " - Ghi chú: $note" : '');

            // Cập nhật status thành 2 (giả sử 2 là trạng thái từ chối)
            $resident->status = 3;
            $resident->save();

            // Phát sự kiện
            event(new ApplicationRefused($resident, $reasons, $note));

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to refuse application: ' . $e->getMessage());
            return false;
        }
    }

    public function get_room($idResident)
    {
        // Lấy thông tin resident dựa trên id
        $resident = Resident::find($idResident);

        // Kiểm tra xem resident có tồn tại không
        if ($resident) {
            // Lấy thông tin phòng dựa trên room_id
            $room = Room::find($resident->room_id);
            return $room; // Trả về thông tin phòng
        }

        return null;
    }

    public function get_status_resident($idResident)
    {
        return Resident::find($idResident)->status;
    }
    public function leave_room($residentId, $userId)
    {
        try {
            // Tìm resident theo ID và user_id
            $resident = Resident::where('id', $residentId)
                ->where('tenant_id', $userId)
                ->first();

            // Kiểm tra xem resident có tồn tại không
            if (!$resident) {
                throw new \Exception('Đơn không tồn tại hoặc không thuộc về bạn.');
            }

            if ($resident->status == self::accepted) {
                // Xóa resident
                $resident->status = self::leave; // Thay đổi trạng thái
                $resident->save(); // Lưu thay đổi

                return true;
            }

            // Phát sự kiện thông báo


            return false; // Trả về true nếu xóa thành công
        } catch (\Exception $e) {
            Log::error('Không thể thu hồi đơn: ' . $e->getMessage());
            return false; // Trả về false nếu có lỗi xảy ra
        }
    }

 
}
