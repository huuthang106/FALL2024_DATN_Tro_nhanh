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

}
