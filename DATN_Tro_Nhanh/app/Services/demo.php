<?php
// <!-- bên trong đây tạo ra các file tương ứng với các bảng để lấy dữ liệu  -->
// đây chỉ là file mẫu mọi người tự tạo ra các file khác ko dùng file này 
namespace App\Services;
// 1 file là 1 model 
use App\Models\User;
class demo
{
    // viết các hàm lấy giá trị của bản đó 
    public function getUserById($id)
    {
        return User::find($id);
    }
}
