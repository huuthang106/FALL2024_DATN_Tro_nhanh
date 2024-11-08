<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ResidentOwnersService;
use Illuminate\Support\Facades\Auth;
use App\Services\RoomOwnersService;

class ResidentOwnersController extends Controller
{
    //
    protected const not_yet_approved = 1; // Hoặc giá trị status mà bạn muốn lọc
    protected const agree = 2; // Hoặc giá trị status mà bạn muốn lọc
    protected const refuse = 3; // Hoặc giá trị status mà bạn muốn lọc
    protected const not_yet = 1; // Hoặc giá trị status mà bạn muốn lọc
    protected $residentOwnersService;
    protected $roomOwnersService;
    public function __construct(ResidentOwnersService $residentOwnersService, RoomOwnersService $roomOwnersService)
    {
        $this->residentOwnersService = $residentOwnersService;
        $this->roomOwnersService = $roomOwnersService;
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
            $residents = $this->residentOwnersService->updateResidentStatus($idResident, $user_id);

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
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập
            $content = 'Bạn đã bị từ chối tham gia phòng';

            // Gọi hàm xóa Resident
            try {
                $this->residentOwnersService->deleteResident($idResident, $user_id, $content);

                // Trả về thông báo thành công
                return redirect()->back()->with('success', 'Xóa khách hàng thành công');
            } catch (\Exception $e) {
                // Trả về thông báo lỗi
                return redirect()->back()->with('error', 'Có lỗi khi duyệt đơn: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Bạn cần đăng nhập để thực hiện hành động này.');
    }


    public function application_form()
    {
        if (Auth::check()) {

            return view('owners.show.application-form');
        }
    }


    public function cancel_order($idResident)
    {
        if (Auth::check()) {
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập

            $get_room = $this->residentOwnersService->get_room($idResident);
            $get_status_resident = $this->residentOwnersService->get_status_resident($idResident);

            if ($get_room) {
                $residents = $this->residentOwnersService->cancel_order($idResident, $user_id);
                if ($residents) {
                    if ($get_status_resident == self::refuse) {
                        return response()->json(['message' => 'Xóa đơn thành công'], 200);
                    } else if ($get_status_resident == self::not_yet) {
                        $update_quantity = $this->roomOwnersService->update_quantity($get_room->id, 1);
                        if ($update_quantity) {
                            return response()->json(['message' => 'Thu hồi đơn thành công, vui lòng liên hệ chủ trọ để lấy lại cọc'], 200);
                        } else {
                            return response()->json(['error' => 'Có lỗi khi cập nhật số lượng phòng.'], 500);
                        }
                    }
                } else {
                    return response()->json(['error' => 'Có lỗi khi hủy đơn.'], 500);
                }
            } else {
                return response()->json(['error' => 'Không tìm thấy phòng.'], 404);
            }
        } else {
            return response()->json(['error' => 'Bạn cần đăng nhập để thực hiện hành động này.'], 401);
        }
    }
    public function leave_the_room($idResident)
    {
        // dd($idResident);
        if (Auth::check()) {
            // dd('hi');
            $user_id = Auth::id(); // Lấy ID người dùng đã đăng nhập
            $get_room = $this->residentOwnersService->get_room($idResident);
            // return response()->json(['error' => 'Có lỗi khi thu hồi' . $get_room->id], 500); // Trả về thông báo lỗi dưới dạng JSON
            // Gọi hàm lấy dữ liệu
            $residents = $this->residentOwnersService->leave_room($idResident,  $user_id,);

            // dd($residents);
            // dd($residents); 
            if ($residents) {
                $update_apartment = $this->roomOwnersService->update_quantity($get_room->id, 1);
                return response()->json(['message' => 'Rời phòng thành công']); // Trả về thông báo thành công dưới dạng JSON
            } else {
                return response()->json(['error' => 'Có lỗi khi thu hồi'], 500); // Trả về thông báo lỗi dưới dạng JSON
            }
        }
    }
    public function refuses(Request $request, $id)
    {
        $reasons = $request->input('title', []);
        $note = $request->input('note', '');

        $success = $this->residentOwnersService->refuseApplication($id, $reasons, $note);

        if ($success) {
         
            return redirect()->back()->with('success', 'Đơn đã được từ chối thành công.');
        } else {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi từ chối đơn.');
        }
    }
   
}
