<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePasswordRequest;
use App\Services\UserClientServices;
use Illuminate\Http\RedirectResponse;
class UserOwnersController extends Controller
{
    public function __construct(UserClientServices $userClientServices)
    {
        $this->userClientServices = $userClientServices;
    }
    // Hiển thị giao diện Thông tin tài khoản Admin
    public function indexProfileAdmin()
    {
        return view('owners.profile.dashboard-my-profiles');
    }
    // Hiển thị giao diện Đổi mật khẩu Admin
    public function indexResetPassWordAdmin()
    {
        return view('owners.profile.page-reset-password-admin');
    }
    public function page_dashboard()
    {
        return view('owners.show.dashboard');
    }
    public function changePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        // Nếu có lỗi, phương thức validateWithBag sẽ tự động chuyển hướng về trang trước đó với thông báo lỗi
        $validated = $request->validated();

        // Nếu không có lỗi, tiếp tục gọi hàm đổi mật khẩu trong PasswordService
        $this->userClientServices->changePassword($request);

        return redirect()->route('owners.profile.dashboard-my-profiles')->with('status', __('Mật khẩu đã được cập nhật thành công.'));
    }
}
