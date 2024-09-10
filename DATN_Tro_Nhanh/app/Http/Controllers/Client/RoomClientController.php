<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Identity;
use App\Services\RoomClientServices;
use App\Models\Favourite;
use Illuminate\Support\Facades\Log;
use App\Services\CommentClientService;

class RoomClientController extends Controller
{
    protected $roomClientService;
    protected $CommentClientService;

    public function __construct(RoomClientServices $roomClientService, CommentClientService $CommentClientService)
    {
        $this->roomClientService = $roomClientService;
        $this->CommentClientService = $CommentClientService;
    }

    public function indexRoom(Request $request, $perPage = 10)
    {
        $searchTerm = $request->input('search');
        $province = $request->input('province');
        $district = $request->input('district');
        $village = $request->input('village');

        $rooms = $this->roomClientService->getAllRoom(
            (int) $perPage,
            $searchTerm,
            $province,
            $district,
            $village
        );

        return view('client.show.listing-grid-with-left-filter', [
            'rooms' => $rooms,
            'searchTerm' => $searchTerm,
            'province' => $province,
            'district' => $district,
            'village' => $village
        ]);
    }

    //Hiển thị giao diện Danh sách phòng trọ có Map
    public function indexRoomMap()
    {
        return view('client.show.listing-half-map-list-layout-1');
    }

    public function page_detail($slug)
    {
        $roomDetails = $this->CommentClientService->getRoomDetailsWithRatings($slug);
        $user = $roomDetails['room']->user;
    
        $userId = auth()->id();
        $identity = Identity::where('user_id', $userId)->first();

        $zone = $roomDetails['room']->zone; 
    
        $comments = $roomDetails['comments'];

        $utilities = $roomDetails['room']->utility;
        $province = $roomDetails['room']->province;
       // Trong controller
$similarRooms = $this->roomClientService->getRoomClient($province, $roomDetails['room']->id);

// Lấy thông tin tiện ích cho từng phòng
foreach ($similarRooms as $room) {
    $utilitiesRoom[] = $room->utility;
}

        return view('client.show.single-propety', [
            'rooms' => $roomDetails['room'],
            'averageRating' => $roomDetails['averageRating'],
            'ratingsDistribution' => $roomDetails['ratingsDistribution'],
            'comments' => $comments,
            'user' => $user,
            'identity' => $identity,
            'zone' => $zone,  // Truyền thông tin zone sang view
            'utilities' => $utilities,
            'similarRooms' => $similarRooms, 
        ]);
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
