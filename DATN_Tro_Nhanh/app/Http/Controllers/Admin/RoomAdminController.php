<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoomAdminService;
use App\Http\Requests\CreateRoomRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Events\RoomCreated;

class RoomAdminController extends Controller
{
    //
    protected $roomAdminService;

    public function __construct(RoomAdminService $roomAdminService)
    {
        $this->roomAdminService = $roomAdminService;
    }
    public function index()
    {
        return view('admincp.show.index');
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
        $roomTypes = $data['roomTypes'];
        return view('admincp.create.addRoom', compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users', 'roomTypes'));
    }
    public function add_room(CreateRoomRequest $request)
    {
        if ($request->isMethod('post')) {
            $room = $this->roomAdminService->create($request);
            // Kích hoạt event
            event(new RoomCreated($room));
            return redirect()->route('admin.add-room-show')->with('success', 'Room đã được tạo thành công.');
        }
        return view('admincp.show.index');
    }
    public function update_room()
    {
        return view('admincp.edit.updateRoom');
    }
}
