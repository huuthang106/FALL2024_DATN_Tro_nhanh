<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserClientServices;
use App\Services\UserAdminServices;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
class UserAdminController extends Controller
{
    protected $userService;
    protected $profileService;

    // Khởi tạo UserService thông qua Dependency Injection
    public function __construct(UserClientServices $userService, ProfileService $profileService, UserAdminServices $userAdminService)
    {
        $this->userService = $userService;
        $this->profileService = $profileService;
        $this->userAdminService = $userAdminService;
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
    public function showuser(Request $request)
    {
        // Lấy tham số từ yêu cầu
        $role = 1; // Ví dụ role = 2
        $searchTerm = $request->input('searchTerm', null);
        $limit = $request->input('limit', 10); // Sử dụng giá trị mặc định nếu không có trong yêu cầu
        $province = $request->input('province', null);
        $district = $request->input('district', null);
        $village = $request->input('village', null);

        // Gọi phương thức để lấy danh sách người dùng
        $users = $this->userService->getUsersByRole($role, $searchTerm, $limit, $province, $district, $village);

        // Trả dữ liệu đến view
        return view('admincp.show.list-users', compact('users'));
    }

    public function show()
    {
        return view('admincp.show.overview');
    }
    public function setting_profile()
    {
        // Lấy thông tin người dùng hiện tại từ service bằng slug
        $user = $this->profileService->getUserById(Auth::user()->slug);
        return view('admincp.show.settings', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request, $slug)
    {
        $data = $request->all();
        $this->profileService->updateProfileBySlug($slug, $data);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    public function private_chat()
    {
        return view('admincp.show.private');
    }
    public function updateRoleAdmin($id)
    {
        $result = $this->userAdminService->updateRoleAdmin($id);
        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.list-user')->with('success', 'Cập nhật thành công.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return back()->with('error', 'Cập nhật thất bại.');
        }
    }
    public function updateRoleUser($id)
    {
        $result = $this->userAdminService->updateRoleUser($id);
        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.list-user')->with('success', 'Cập nhật thành công.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return back()->with('error', 'Cập nhật thất bại.');
        }
    }
    public function showUserRole()
    {
        $users = $this->userAdminService->getUserRole();
        return view('admincp.show.show-user',compact('users'));
    }
}