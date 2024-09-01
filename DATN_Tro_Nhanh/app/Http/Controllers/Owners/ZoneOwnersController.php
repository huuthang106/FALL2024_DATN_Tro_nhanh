<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoneServices;
use App\Http\Requests\ZoneRequest;
use Illuminate\Support\Facades\Auth;

use App\Events\ZoneCreated; // Import event

class ZoneOwnersController extends Controller
{
    protected $zoneServices;
    //

    public function __construct(ZoneServices $zoneServices)
    {
        $this->zoneServices = $zoneServices;
    }
    public function index()
    {

        return view('owners.create.add-new-zone');
    }

    public function showDetailOwners($slug)
    {
        $zones = $this->zoneServices->showDetail($slug);
        return view('owners.show.dashbroard-zone-detail', compact('zones'));
    }
    public function store(ZoneRequest $request)
    {

        if ($request->isMethod('post')) {
            $zone = $this->zoneServices->store($request);

            if ($zone) {
                // Phát sự kiện ZoneCreated và truyền đối tượng Zone mới tạo
                event(new ZoneCreated($zone));

                return redirect()->route('owners.zone-post')->with('success', 'Zone đã được tạo thành công.');
            }
        }


        return view('owners.zone-post');
    }

    public function listZone()
    {
        $user_id = Auth::id();
        if (Auth::check() && Auth::user()->role != 1) {
            $zones = $this->zoneServices->getMyZone($user_id);
            // Xử lý yêu cầu không phải AJAX
            return view('owners.show.dashbroard-my-zone', ['zones' => $zones]);
        } else {
            // Nếu người dùng không có quyền, chuyển hướng về trang chính
            return redirect()->route('client.home');
        }
    }
    public function viewUpdate($slug)
    {
        $user_id = Auth::id();
        if (Auth::check() && Auth::user()->role != 1) {
            $zone = $this->zoneServices->getIdZone($slug);

            return view('owners.edit.update-zone', ['zone' => $zone]);
        } else {
            // Nếu người dùng không có quyền, chuyển hướng về trang chính
            return redirect()->route('client.home');
        }

    }
    public function update(ZoneRequest $request, $id)
    {

        if ($request->isMethod('PUT')) {
            $zone = $this->zoneServices->update($request, $id);

            if ($zone) {
                // Phát sự kiện ZoneCreated và truyền đối tượng Zone mới tạo


                return redirect()->route('owners.zone-list')->with('success', 'Zone đã được tạo thành công.');
            }
        }


        return view('owners.zone-post');
    }

    public function destroy($id)
    {
        $result = $this->zoneServices->softDeleteZones($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('owners.trash-zone')->with('success', $result['message']);
    }


    public function trash()
    {
        $trashedZones = $this->zoneServices->getTrashedZones();
        return view('owners.trash.trash-zone', compact('trashedZones'));
    }

    public function restore($id)
    {
        $this->zoneServices->restoreZones($id);
        return redirect()->route('owners.zone-list')->with('success', 'Khu trọ đã được khôi phục.');
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
        return redirect()->route('owners.trash-zone')->with('success', 'Khu trọ đã được xóa vĩnh viễn.');
    }


}
