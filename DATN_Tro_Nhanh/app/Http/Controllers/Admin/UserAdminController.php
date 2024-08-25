<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserClientServices;
class UserAdminController extends Controller
{
    protected $userService;

    // Khởi tạo UserService thông qua Dependency Injection
    public function __construct(UserClientServices $userService)
    {
        $this->userService = $userService;
    }
   
    public function index(Request $request)
    {
        // Lấy tham số từ yêu cầu
        $role = 2; // Ví dụ role = 2
        $searchTerm = $request->input('searchTerm', null);
        $limit = $request->input('limit', 10); // Sử dụng giá trị mặc định nếu không có trong yêu cầu
        $province = $request->input('province', null);
        $district = $request->input('district', null);
        $village = $request->input('village', null);

        // Gọi phương thức để lấy danh sách người dùng
        $users = $this->userService->getUsersByRole($role, $searchTerm, $limit, $province, $district, $village);

        // Trả dữ liệu đến view
        return view('admincp.show.list-owner', compact('users'));
    }



    public function setting_profile()
    {
        return view('admincp.show.settings');
    }
    public function private_chat()
    {
        return view('admincp.show.private');
    }
}