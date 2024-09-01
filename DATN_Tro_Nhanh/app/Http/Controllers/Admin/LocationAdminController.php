<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LocationAdminService;
use App\Http\Requests\CreateLocationRequest;

class LocationAdminController extends Controller
{

    protected $locationAdminService;

    public function __construct(LocationAdminService $locationAdminService)
    {
        $this->locationAdminService = $locationAdminService;
    }
    public function index()
    {
        return view('admincp.show.index');
    }

    public function show_location()
    {
        $locations = $this->locationAdminService->showLocation();
        return view('admincp.show.showLocation', ['locations' => $locations]);
    }

    public function add_location_show()
    {
        return view('admincp.create.addLocation');
    }

    public function add_location(CreateLocationRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                $location = $this->locationAdminService->createLocation($request);
                return redirect()->route('admin.show-location')->with('success', 'Thêm gói tin thành công.');
            } catch (\Exception $e) {
                return redirect()->route('admin.show-location')->with('success', 'Thêm goi tin không thành công.');
            }
        }
    }

    public function update_location_show($slug)
    {
        $locations = $this->locationAdminService->getLocationBySlug($slug);
        return view('admincp.edit.updateLocation', ['locations' => $locations]);
    }

    public function update_location(CreateLocationRequest $request, $slug)
    {
        $result = $this->locationAdminService->updateLocation($request, $slug);

        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.show-location')->with('success', 'Gói tin đã cập nhật thành công.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return redirect()->route('admin.show-location')->with('success', 'Cập nhật gói tin không thành công.');
        }
    }

    public function destroy($id)
    {
        $result = $this->locationAdminService->softDeleteLocation($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('admin.trash-location')->with('success', $result['message']);
    }

    public function trash()
    {
        $trashedLocations = $this->locationAdminService->getTrashedLocations();
        return view('admincp.trash.trash-location', compact('trashedLocations'));
    }

    public function restore($id)
    {
        $this->locationAdminService->restoreLocation($id);
        return redirect()->route('admin.show-location')->with('success', 'Location đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        $result = $this->locationAdminService->forceDeleteLocation($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('admin.trash-location')->with('success', $result['message']);
    }


}
