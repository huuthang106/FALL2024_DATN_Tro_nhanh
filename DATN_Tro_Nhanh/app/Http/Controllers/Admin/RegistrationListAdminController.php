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
        if(Auth::check()) {
        $single_detail = $this->registrationAdminService->getID($id);
        $id_intentity = $this->identityService->getIdIdentity($single_detail->user_id);
// dd($id_intentity);
        $list_image = $this->imageAdminService->getImageUserId($id_intentity);
        // dd($list_image);
        return view('admincp.show.detail-register', compact('single_detail', 'list_image'));
        }
        return redirect()->route('/')->with('error', '');
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
