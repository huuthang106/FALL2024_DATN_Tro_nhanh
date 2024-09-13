<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AcreageAdminService;
use App\Http\Requests\CreateAcreageRequest;

class AcreageAdminController extends Controller
{
    protected $acreageAdminService;

    public function __construct(AcreageAdminService $acreageAdminService)
    {
        $this->acreageAdminService = $acreageAdminService;
    }
    public function index()
    {
        return view('admincp.show.index');
    }
    public function deleteAcreage($id)
    {
        $deleted = $this->acreageAdminService->deleteAcreage($id);

        if ($deleted) {
            return redirect()->route('admincp.show.showAcreage')->with('success', 'Diện tích đã được xóa thành công.');
        }

        return redirect()->route('admincp.show.showAcreage')->with('error', 'Diện tích không tồn tại.');
    }
    public function show_acreage()
    {
        $acreages = $this->acreageAdminService->showAcreage();
        return view('admincp.show.showAcreage', ['acreages' => $acreages]);
    }

    public function add_acreage_show()
    {
        return view('admincp.create.addAcreage');
    }

    public function update_acreage_show($id)
    {
        $acreages = $this->acreageAdminService->getAcreageById($id);
        return view('admincp.edit.updateAcreage', ['acreages' => $acreages]);
    }

    public function add_acreage(CreateAcreageRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                $acreage = $this->acreageAdminService->created($request);
                // Redirect với thông báo thành công
                return redirect()->route('admin.show-acreage')->with('success', 'Thêm diện tích thành công.');
            } catch (\Exception $e) {
                // Nếu có lỗi xảy ra, sửa thông báo
                return redirect()->route('admin.show-acreage')->with('error', 'Đã xảy ra lỗi khi tạo Diện tích.');
            }
        }
    }

    public function update_acreage(CreateAcreageRequest $request, $id)
    {
        $result = $this->acreageAdminService->update($request, $id);

        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.show-acreage')->with('success', 'Diện tích đã cập nhật thành công.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return back()->with('error', 'Failed to update acreage.');
        }
    }

}
