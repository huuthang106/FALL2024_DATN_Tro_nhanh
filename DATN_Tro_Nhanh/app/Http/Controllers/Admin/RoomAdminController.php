<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RoomAdminService;
use App\Http\Requests\CreateRoomRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Events\RoomCreated;
use Illuminate\Http\Request;
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

    public function destroy($id)
    {
        $result = $this->roomAdminService->softDeleteRoom($id);

        if ($result['status'] === 'error') {
            // Nếu có người ở, quay lại trang hiện tại với thông báo lỗi
            return redirect()->back()->with('error', $result['message']);
        }

        // Nếu xóa thành công, chuyển hướng đến trang thùng rác với thông báo thành công
        return redirect()->route('admin.trash-room')->with('success', 'Phòng đã được chuyển vào thùng rác.');
    }


    public function trash()
    {
        $trashedRooms = $this->roomAdminService->getTrashedRooms();
        return view('admincp.trash.trash-room', compact('trashedRooms'));
    }

    public function restore($id)
    {
        $this->roomAdminService->restoreRoom($id);
        return redirect()->route('admin.show-room')->with('success', 'Phòng đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        $this->roomAdminService->forceDeleteRoom($id);
        return redirect()->route('admin.trash-room')->with('success', 'Phòng đã được xóa vĩnh viễn.');
    }

    public function show_room()
    {
        $rooms = $this->roomAdminService->showRoomWhere();
        return view('admincp.show.showRoom', ['rooms' => $rooms]);
    }

    public function show_room_all()
    {
        $rooms = $this->roomAdminService->showRoomAll();
        return view('admincp.show.showAll-room', ['rooms' => $rooms]);
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
        $userStatus = $data['userStatus'];
        return view('admincp.create.addRoom', compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users','userStatus'));
    }
    public function add_room_test(CreateRoomRequest $request)
    {
        if ($request->isMethod('post')) {
            $room = $this->roomAdminService->create($request);
            if ($room) {
                event(new RoomCreated($room));

                // Redirect với thông báo thành công
                return redirect()->route('admin.show-room')->with('success', 'Room đã được tạo thành công.');
            } else {
                // Handle the case where room creation failed
                return redirect()->route('admin.add-room-show')->with('error', 'Đã xảy ra lỗi khi tạo Room.');
            }
        }
        // Return a proper view if the request method is not POST
        return view('admincp.show.showRoom');
    }
    public function add_room(Request $request)
    {
        if ($request->isMethod('post')) {
            $room = $this->roomAdminService->create($request);
            if ($room) {
                event(new RoomCreated($room));

                // Redirect với thông báo thành công
                return redirect()->route('admin.show-room')->with('success', 'Room đã được tạo thành công.');
            } else {
                // Handle the case where room creation failed
                return redirect()->route('admin.show-room')->with('error', 'Đã xảy ra lỗi khi tạo Room.');
            }
        }
        // Return a proper view if the request method is not POST
        return view('admincp.show.showRoom');
    }
    public function update_room_show($slug)
    {
        $data = $this->roomAdminService->getSlugRoom($slug);
        $rooms = $data['rooms'];
        $utilities = $this->roomAdminService->getRoomUtilities($rooms->id); // Lấy tiện ích của phòng
        $categories = $data['categories'];
        $acreages = $data['acreages'];
        $locations = $data['locations'];
        $zones = $data['zones'];
        $users = $data['users'];

        return view('admincp.edit.updateRoom', compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users', 'utilities'));
    }
    public function update_room(CreateRoomRequest $request, $slug)
    {
        $result = $this->roomAdminService->update($request, $slug);

        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.show-room')->with('success', 'Cập nhật phòng thành công.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return back()->with('error', 'Cập nhật phòng thất bại.');
        }
    }
}
