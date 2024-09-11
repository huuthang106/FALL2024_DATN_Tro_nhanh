<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ResidentOwnersService;
use Illuminate\Support\Facades\Auth;

class ResidentOwnersController extends Controller
{
    //
    protected const not_yet_approved = 1; // Hoặc giá trị status mà bạn muốn lọc
    protected const agree = 2; // Hoặc giá trị status mà bạn muốn lọc
    protected $residentOwnersService;
    public function __construct(ResidentOwnersService $residentOwnersService)
    {
        $this->residentOwnersService = $residentOwnersService;
    }
    public function participation_list()
    {
        if (Auth::check()) {
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập


            // Gọi hàm lấy dữ liệu
            $residents = $this->residentOwnersService->getlistResdent($user_id, self::not_yet_approved);

            // dd($residents); 
            return view('owners.show.participation_list', [
                'residents' => $residents,
            ]);
        }

        return redirect()->route('login'); // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
    }
    public function approve_application($idResident)
    {
        if (Auth::check()) {
            // dd('hi');
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập


            // Gọi hàm lấy dữ liệu
            $residents = $this->residentOwnersService->updateResidentStatus($idResident, self::agree, $user_id);

            // dd($residents); 
            if ($residents) {
                return redirect()->back()->with('success', 'Duyệt đơn thành công');
            } else {
                return redirect()->back()->with('error', 'Có lỗi khi duyệt đơn');
            }
        }
    }
    public function erase_tenant($idResident)
    {

        if (Auth::check()) {
            // dd('hi');
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập

            $content = 'Bạn đã bị xóa khỏi phòng ';
            // Gọi hàm lấy dữ liệu
            $residents = $this->residentOwnersService->deleteResident($idResident,  $user_id, $content);

            // dd($residents); 
            if ($residents) {
                return redirect()->back()->with('success', 'Xóa khách hàng thành công');
            } else {
                return redirect()->back()->with('error', 'Có lỗi khi duyệt đơn');
            }
        }
    }
    public function refuse($idResident)
    {

        if (Auth::check()) {
            // dd('hi');
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập

            $content = 'Bạn đã bị từ trối tham gia phòng ';
            // Gọi hàm lấy dữ liệu
            $residents = $this->residentOwnersService->deleteResident($idResident,  $user_id, $content);

            // dd($residents); 
            if ($residents) {
                return redirect()->back()->with('success', 'Xóa khách hàng thành công');
            } else {
                return redirect()->back()->with('error', 'Có lỗi khi duyệt đơn');
            }
        }
    }

    public function application_form(){
        if (Auth::check()) {
            // dd('hi');
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập


            // Gọi hàm lấy dữ liệu
            $residents = $this->residentOwnersService->getmyResdent($user_id,  self::not_yet_approved);

            // dd($residents); 
            
            return view('owners.show.application-form', [
                'residents' => $residents,
            ]);
        }

    }
    public function cancel_order($idResident)
    {

        if (Auth::check()) {
            // dd('hi');
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập

         
            // Gọi hàm lấy dữ liệu
            $residents = $this->residentOwnersService->cancel_order($idResident,  $user_id,);

            // dd($residents); 
            if ($residents) {
                return redirect()->back()->with('success', 'Thu hồi đơn thành công');
            } else {
                return redirect()->back()->with('error', 'Có lỗi khi thu hồi');
            }
        }
    }
    
}
