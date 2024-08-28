<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegistrationAdminService;
use App\Services\ImageAdminService;
use App\Services\UserAdminServices;
use phpDocumentor\Reflection\Types\Self_;

class RegistrationListAdminController extends Controller
{
    //
    protected $RegistrationAdminService;
    private const role_owner = 2;
    private const hidden_status = 2;

    public function __construct(RegistrationAdminService $registrationAdminService, ImageAdminService $imageAdminService, UserAdminServices $userAdminServices)
    {
        $this->registrationAdminService = $registrationAdminService;
        $this->imageAdminService = $imageAdminService;
        $this->userAdminServices = $userAdminServices;
    }
    public function index()
    {

        $list = $this->registrationAdminService->getAll();
        return view('admincp.show.list-register', compact('list'));
    }
    public function show($id)
    {

        $single_detail = $this->registrationAdminService->getID($id);
        $list_image = $this->imageAdminService->getImageUserId($single_detail->id);
        // dd($list_image);
        return view('admincp.show.detail-register', compact('single_detail', 'list_image'));
    }
    public function start_approve_application($id)
    {
        // dd('hi');
        $single_detail = $this->registrationAdminService->getID($id);
        if (!$single_detail) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi trả dữ liệu. Vui lòng thử lại.');
        }

        $start_update = $this->userAdminServices->updateRole($single_detail->user_id, Self::role_owner);
        if (!$start_update) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cấp quyền. Vui lòng thử lại.');
        }

        $update_status = $this->registrationAdminService->updateStatus($id, Self::hidden_status);
        return redirect()->route('admin.list-registers')->with('success', 'Duyệt đơn thành công.');
    }
}
