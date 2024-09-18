<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Đảm bảo bạn đã import model User
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function creditUser()
    {
        // Xác thực dữ liệu đầu vào
        // Log::info('Credit User Request Data:', $request->all());

        // Tạo user mặc định nếu chưa tồn tại
        $defaultEmail = 'default@example.com'; // Địa chỉ email mặc định
        $defaultPassword = bcrypt('password'); // Mật khẩu mặc định

        // Kiểm tra xem user đã tồn tại chưa
        // $user = User::where('email', $defaultEmail)->first();

 
            // Nếu chưa tồn tại, tạo user mới
            $user = User::create([
                'name' => 'Default User',
                'email' => $defaultEmail,
                'password' => $defaultPassword,
                'phone' => '0123456789', // Số điện thoại mặc định
                'address' => 'Default Address', // Địa chỉ mặc định
                'role' => 1, // Vai trò mặc định
                'balance' => '0', // Số dư mặc định
                'token' => null, // Token mặc định
                'slug' => 'default-user', // Slug mặc định
                'google_id' => null, // Google ID mặc định
                'status' => 1, // Trạng thái mặc định
                'image' => null, // Hình ảnh mặc định
                'identification_number' => null, // Số nhận dạng mặc định
                'provider' => null, // Nhà cung cấp mặc định
                'provider_id' => null, // ID nhà cung cấp mặc định
                'provider_token' => null, // Token nhà cung cấp mặc định
                'deleted_at' => null, // Thời gian xóa mặc định
            ]);
            
            Log::info('Created new user:', ['id' => $user->id, 'email' => $user->email]);
     

        // Logic xử lý (nếu có)

        return response()->json(['status' => 'success', 'message' => 'Credit processed successfully.'], 200);
    }
}