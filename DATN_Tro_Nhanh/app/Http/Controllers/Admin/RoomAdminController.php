<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoomAdminService;
use App\Http\Requests\CreateRoomRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Events\RoomCreated;
use App\Models\Notification;
use App\Services\CategoryAdminService;

class RoomAdminController extends Controller
{
    //
    protected $roomAdminService;
    protected $categoryAdminService;

    public function __construct(RoomAdminService $roomAdminService, CategoryAdminService $categoryAdminService)
    {
        $this->roomAdminService = $roomAdminService;
        $this->categoryAdminService = $categoryAdminService;
    }
    public function index()
    {
        $roomsCountByCategoryType = $this->categoryAdminService->getRoomsCountByCategoryType();
        return view('admincp.show.index', compact('roomsCountByCategoryType'));
    }

    public function show_room()
    {
        $rooms = $this->roomAdminService->showRoomWhere();
        return view('admincp.show.showRoom', ['rooms' => $rooms]);
    }

    public function show_room_available()
    {
        $rooms = $this->roomAdminService->showRoomStatus();
        return view('admincp.show.showRoom', ['rooms' => $rooms]);
    }
    public function add_room_show()
    {
        $data = $this->roomAdminService->getRoom();
        $rooms = $data['rooms'];
        $categories = $data['categories'];
        $acreages = $data['acreages'];
        $locations = $data['locations'];
        $zones = $data['zones'];
        $users = $data['users'];

        return view('admincp.create.addRoom', compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users'));
    }
    public function add_room(CreateRoomRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                $room = $this->roomAdminService->create($request);
                // Kích hoạt event
                event(new RoomCreated($room));

                // Redirect với thông báo thành công
                return redirect()->route('admin.show-room')->with('success', 'Room đã được tạo thành công.');
            } catch (\Exception $e) {
                // Nếu có lỗi xảy ra, sửa thông báo
                return redirect()->route('admin.show-room')->with('error', 'Đã xảy ra lỗi khi tạo Room.');
            }
        }
    }
    public function update_room_show($slug)
    {
        $data = $this->roomAdminService->getSlugRoom($slug);
        $rooms = $data['rooms'];
        $categories = $data['categories'];
        $acreages = $data['acreages'];
        $locations = $data['locations'];
        $zones = $data['zones'];
        $users = $data['users'];

        return view('admincp.edit.updateRoom', compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users'));
    }
    public function update_room(Request $request, $slug)
    {
        $result = $this->roomAdminService->update($request, $slug);

        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.show-room')->with('success', 'Room updated successfully.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return back()->with('error', 'Failed to update room.');
        }
    }
}
