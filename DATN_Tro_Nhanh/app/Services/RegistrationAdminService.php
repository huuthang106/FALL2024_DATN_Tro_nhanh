<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\RegistrationList;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;

class RegistrationAdminService
{
    public function getAll()
    {
        $registrations = RegistrationList::orderByDesc('created_at')->where('status', 1)->paginate(10);
        return $registrations;
    }
    public function getID($id)
    {
        $user = RegistrationList::where('id', $id)->first();
        return $user;
    }
    public function updateStatus($id, $status)
    {
        // Tìm đối tượng bằng id
        $user = RegistrationList::find($id);

        // Kiểm tra nếu đối tượng tồn tại
        if ($user) {
            // Cập nhật trạng thái
            $user->status = $status;
            $user->save(); // Lưu thay đổi vào cơ sở dữ liệu

            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $registration = RegistrationList::find($id);

        if ($registration) {
            $registration->delete(); // Xóa mềm
            return true;
        }

        return false;
    }
}
