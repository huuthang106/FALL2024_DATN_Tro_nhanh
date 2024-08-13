<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserOwnersController extends Controller
{
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
}
