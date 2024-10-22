<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegistrationAdminService;
use App\Services\ImageAdminService;
use App\Services\UserAdminServices;
use App\Services\IdentityService;
use phpDocumentor\Reflection\Types\Self_;
use Illuminate\Support\Facades\Auth;
class RegistrationListAdminController extends Controller
{
    //
    const phantrang = 10;
    protected $registrationAdminService;
    protected $imageAdminService;
    protected $identityService;
    protected $userAdminServices;
    private const role_owner = 2;
    private const hidden_status = 2;

    public function __construct(RegistrationAdminService $registrationAdminService, ImageAdminService $imageAdminService, UserAdminServices $userAdminServices, IdentityService $identityService)
    {
        $this->registrationAdminService = $registrationAdminService;
        $this->imageAdminService = $imageAdminService;
        $this->userAdminServices = $userAdminServices;
        $this->identityService = $identityService;
    }
    public function index()
    {
        // Sử dụng service để lấy danh sách các bản ghi
        $list = $this->registrationAdminService->getAll();
        return view('admincp.show.list-register', compact('list'));
    }

    public function refuse($id)
    {
        $deleted = $this->registrationAdminService->delete($id);

        if ($deleted) {
            return redirect()->route('admin.list-registers')->with('success', 'Từ chối đơn thành công.');
        }

        return redirect()->route('admin.list-registers')->with('error', 'Từ chối đơn thất bại.');
    }
    public function show($id)
    {
        if (Auth::check()) {
            $single_detail = $this->registrationAdminService->getID($id);
    
            if ($single_detail && $single_detail->identity && $single_detail->identity->user) {
                $user = $single_detail->identity->user;
                $profile_image = $this->imageAdminService->getImageUserId($user->id);
                $front_id_card_image = $single_detail->identity->front_id_card_image;
                $back_id_card_image = $single_detail->identity->back_id_card_image;
    
                return view('admincp.show.detail-register', compact('single_detail', 'profile_image', 'front_id_card_image', 'back_id_card_image'));
            }
    
            return redirect()->route('home')->with('error', 'Không tìm thấy thông tin chi tiết.');
        }
    
        return redirect()->route('home')->with('error', 'Bạn cần đăng nhập để xem chi tiết.');
    }
    public function start_approve_application($id)
    {
        // dd('hi');
        $single_detail = $this->registrationAdminService->getID($id);
        if (!$single_detail) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi trả dữ liệu. Vui lòng thử lại.');
        }

        $start_update = $this->userAdminServices->updateRole($single_detail->user_id, self::role_owner);
        if (!$start_update) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cấp quyền. Vui lòng thử lại.');
        }

        $update_status = $this->registrationAdminService->updateStatus($id, self::hidden_status);
        return redirect()->route('admin.list-registers')->with('success', 'Duyệt đơn thành công.');
    }
}
