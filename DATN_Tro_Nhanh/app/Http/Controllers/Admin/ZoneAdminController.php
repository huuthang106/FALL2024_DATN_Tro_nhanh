<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ZoneRequest;
use App\Services\ZoneServices;
use App\Events\ZoneCreated;
use Illuminate\Support\Facades\Auth;
class ZoneAdminController extends Controller
{
    protected $zoneServices;

    public function __construct(ZoneServices $zoneServices)
    {
        $this->zoneServices = $zoneServices;
    }

    public function showDetailAdmin($slug)
    {
        // You can set the status value here (e.g., 2, if that's what you need)
        $status = 2; // Assuming '2' is the intended status for filtering residents
    
        // Pass both slug and status to the showDetail method
        $zones = $this->zoneServices->showDetail($slug, $status);
        
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
            return redirect()->route('admin.all_zone')
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
    public function listMyZone()
    {
        $user_id = Auth::id();
        if (Auth::check() && Auth::user()->role != 1) {
            $zones = $this->zoneServices->getMyZone($user_id);
            // Xử lý yêu cầu không phải AJAX
            return view('admincp.show.zone', compact('zones'));
        } else {
            // Nếu người dùng không có quyền, chuyển hướng về trang chính
            return redirect()->route('client.home');
        }

       
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

    public function destroy($id)
    {
        $result = $this->zoneServices->softDeleteZones($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('admin.trash-zone')->with('success', $result['message']);
    }


    public function trash()
    {
        $trashedZones = $this->zoneServices->getTrashedZones();
        return view('admincp.trash.trash-zone', compact('trashedZones'));
    }

    public function restore($id)
    {
        $this->zoneServices->restoreZones($id);
        return redirect()->route('admin.danh-sach-khutro')->with('success', 'Khu trọ đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        // Gọi phương thức forceDeleteZones từ service
        $result = $this->zoneServices->forceDeleteZones($id);

        if ($result['status'] === 'error') {
            // Nếu không thể xóa vĩnh viễn do có phòng hoạt động hoặc người ở, quay lại trang hiện tại với thông báo lỗi
            return redirect()->back()->with('error', $result['message']);
        }

        // Nếu xóa vĩnh viễn thành công, chuyển hướng đến trang danh sách khu trọ đã xóa với thông báo thành công
        return redirect()->route('admin.trash-zone')->with('success', 'Khu trọ đã được xóa vĩnh viễn.');
    }



}
