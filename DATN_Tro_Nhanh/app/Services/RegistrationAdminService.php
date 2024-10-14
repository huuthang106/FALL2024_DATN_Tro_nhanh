<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Registrationlist;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class RegistrationAdminService
{
    public function getAll()
    {
        $registrations = Registrationlist::orderByDesc('created_at')->where('status', 1)->paginate(10);
        return $registrations;
    }
    public function getID($id)
    {
        $user = Registrationlist::where('id', $id)->first();
        return $user;
    }
    public function updateStatus($id, $status)
    {
        // Tìm đối tượng bằng id
        $user = Registrationlist::find($id);

        if ($user) {
            // Cập nhật trạng thái
            $user->status = $status;
            $user->save(); // Lưu thay đổi vào cơ sở dữ liệu

            $registration = User::find($user->user_id); // Tìm user từ user_id
    
            // Tạo thông báo mới sau khi cập nhật role thành công
            Notification::create([
                'type' => 'Đơn Xin Làm Chủ Trọ',
                'data' => 'Bạn đã được duyệt đơn.', // Thêm dữ liệu thông báo vào đây
                'user_id' => $registration->id,  // Giả định user_id có trong $user
                'registration_list_id' => $user->id,
            ]);
         
            // Gửi email thông báo cập nhật trạng thái
            \Mail::to($registration->email)->send(new \App\Mail\StatusUpdatedMail($user));
    
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $registration = Registrationlist::find($id);

        if ($registration) {
            $registration->delete(); // Xóa mềm
            return true;
        }

        return false;
    }
}
