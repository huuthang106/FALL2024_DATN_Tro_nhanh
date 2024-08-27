<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoneRequest;
use App\Services\ZoneServices;
use App\Events\ZoneCreated;

class ZoneAdminController extends Controller
{
    protected $zoneServices;

    public function __construct(ZoneServices $zoneServices)
    {
        $this->zoneServices = $zoneServices;
    }

    public function showDetailAdmin($slug)
    {
        $zones = $this->zoneServices->showDetail($slug);
        return view('admincp.show.list-detail-zone', compact('zones'));
    }

    public function addZoneForm()
    {
        return view('admincp.create.addZone');
    }

    public function addZone(ZoneRequest $request)
    {
        $result = $this->zoneServices->store($request);

        if ($result) {
            return redirect()->route('admin.trang-them-khu-tro')
                ->with('success', 'Khu trọ đã được thêm thành công.');
        } else {
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
        }
    }
    public function listZone()
    {
        $zones = $this->zoneServices->getAllZones();

        return view('admincp.show.zone', compact('zones'));
    }
    public function editZoneForm($id)
    {
        $zone = $this->zoneServices->findById($id);
        if (!$zone) {
            return redirect()->route('admin.danh-sach-khutro')
                ->with('error', 'Khu trọ không tồn tại.');
        }

        return view('admincp.edit.updateZone', compact('zone'));
    }

    public function updateZone(ZoneRequest $request, $id)
    {
        $result = $this->zoneServices->update($request, $id);

        if ($result) {
            return redirect()->route('admin.danh-sach-khutro')
                ->with('success', 'Khu trọ đã được cập nhật thành công.');
        } else {
            return redirect()->back()
                ->with('error', 'Có lỗi xảy ra. Khu trọ không tìm thấy.');
        }
    }



}
