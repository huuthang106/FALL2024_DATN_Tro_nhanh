<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Services\RoomClientServices;
use App\Models\Favourite; // Model để thao tác với bảng favourites
// use App\Models\Room; // Model để thao tác với bảng rooms
use Illuminate\Support\Facades\Log;

class RoomClientController extends Controller
{
    protected $roomClientService;

    public function __construct(RoomClientServices $roomClientService)
    {
        $this->roomClientService = $roomClientService;
    }

    //Hiển thị giao diện Danh sách phòng trọ
    public function indexRoom($perPage = 10)
    {
        $rooms = $this->roomClientService->getAllRoom((int) $perPage);
        return view('client.show.listing-grid-with-left-filter', ['rooms' => $rooms]);
    }
    //Hiển thị giao diện Danh sách phòng trọ có Map
    public function indexRoomMap()
    {
        return view('client.show.listing-half-map-list-layout-1');
    }
    public function page_detail($slug)
    {
        $rooms = $this->roomClientService->getSlugRoom($slug);
        return view('client.show.single-propety', ['rooms' => $rooms]);
    }
    public function addFavourite(Request $request, $slug)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!$request->user()) {
            return redirect()->back()->with('error', 'User not authenticated');
        }
    
        $userId = $request->user()->id;
    
        // Tìm phòng theo slug
        $room = Room::where('slug', $slug)->first();
    
        // Nếu không tìm thấy phòng
        if (!$room) {
            return redirect()->back()->with('error', 'Room not found');
        }
    
        $roomId = $room->id;
    
        // Thêm hoặc cập nhật thông tin vào bảng favourites
        Favourite::updateOrCreate(
            ['user_id' => $userId, 'room_id' => $roomId]
        );
    
        // Ghi thông tin vào log để kiểm tra
        Log::info('Added to favourites', [
            'user_id' => $userId,
            'room_id' => $roomId
        ]);
    
        // Trả về thông báo thành công và giữ nguyên trang
        return redirect()->back()->with('success', 'Phòng đã được thêm vào danh sách yêu thích thành công!');
    }
    

}
