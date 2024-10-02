<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoneServices;
use App\Http\Requests\ZoneRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
use App\Events\ZoneCreated; // Import event
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Image;

class ZoneOwnersController extends Controller
{
    protected $zoneServices;
    protected const show = 2;
    protected const user_is_in = 2;


    //

    public function __construct(ZoneServices $zoneServices)
    {
        $this->zoneServices = $zoneServices;
    }
    public function index()
    {

        return view('owners.create.add-new-zone');
    }
    // Chi tiết khu trọ
    public function showDetailOwners($slug)
    {
        $data = $this->zoneServices->showDetail($slug, self::show);
        // dd($data);
        // dd($data);
        return view('owners.show.dashbroard-zone-detail', [
            'zone' => $data['zone'],
            'rooms' => $data['rooms'],
            'residents' => $data['residents'],
            'user_is_in' => self::user_is_in,
        ]);
    }
    // Xóa mềm Residents
    public function destroyResident($id)
    {
        $this->zoneServices->softDeleteResident($id);
        return redirect()->back()->with('success', 'Xóa thành công.');
    }
    // Tạo hóa đơn
    public function storeBill(BillRequest $request)
    {
        $this->zoneServices->createBill($request->validated());
        return redirect()->back()->with('success', 'Hóa đơn đã được tạo thành công.');
    }



    public function store(ZoneRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                $result = $this->zoneServices->store($request);
    
                if ($result['success']) {
                    event(new ZoneCreated($result['zone']));
                    return response()->json([
                        'success' => true,
                        'message' => 'Khu trọ đã được tạo thành công.',
                        'redirect' => route('owners.zone-list')
                    ]);
                } else {
                    Log::error('Lỗi khi tạo khu trọ: ' . ($result['message'] ?? 'Không có thông báo lỗi'));
                    return response()->json([
                        'success' => false,
                        'message' => $result['message'] ?? 'Đã xảy ra lỗi khi tạo khu trọ.'
                    ], 400);
                }
            } catch (\Exception $e) {
                Log::error('Exception khi tạo khu trọ: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Đã xảy ra lỗi không mong muốn khi tạo khu trọ.'
                ], 500);
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
        try {
            $result = $this->zoneServices->update($request, $id);

            if ($result['success']) {
                return response()->json([
                    'success' => true,
                    'message' => 'Khu trọ đã được cập nhật thành công.',
                    'redirect' => route('owners.zone-list')
                ]);
            } else {
                Log::error('Lỗi khi cập nhật khu trọ: ' . ($result['message'] ?? 'Không có thông báo lỗi'));
                return response()->json([
                    'success' => false,
                    'message' => $result['message'] ?? 'Đã xảy ra lỗi khi cập nhật khu trọ.'
                ], 400);
            }
        } catch (\Exception $e) {
            Log::error('Exception khi cập nhật khu trọ: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi không mong muốn khi cập nhật khu trọ.'
            ], 500);
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
    public function destroyy($id)
    {
        $result = $this->zoneServices->softDeleteZoness($id);

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
    public function deleteImage($id)
    {
        $image = Image::findOrFail($id);

        // Xóa file ảnh từ thư mục public
        $imagePath = public_path('assets/images/' . $image->filename);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Xóa bản ghi từ database
        $image->delete();

        return response()->json(['success' => true]);
    }
}
