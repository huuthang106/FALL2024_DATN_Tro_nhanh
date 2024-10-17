<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Zone;
use App\Models\Identity;
use App\Services\RoomClientServices;
use App\Models\Favourite;
use Illuminate\Support\Facades\Log;
use App\Services\CommentClientService;
use Illuminate\Support\Facades\Cookie;

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
        $category = $request->input('category'); // Thêm tham số category
        $features = $request->input('features');
        $type = $request->input('type');
        // dd($features);
        $rooms = $this->roomClientService->getAllRoom(
            (int) $perPage,
            $type,
            $searchTerm,
            $province,
            $district,
            $village,
            $category,
            $features
        );

        $locations = $this->roomClientService->getUniqueLocations();
        // Lấy phòng nổi bật
        $popularRooms = $this->roomClientService->getPopularRooms();
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'rooms' => $rooms,
                'searchTerm' => $searchTerm,
                'province' => $province,
                'district' => $district,
                'village' => $village,
                'provinces' => $locations['provinces'],
                'districts' => $locations['districts'],
                'villages' => $locations['villages'],
                'popularRooms' => $popularRooms
            ]);
        }

        $categories = $this->roomClientService->getCategories(); // Lấy danh sách categories

        return view('client.show.listing-grid-with-left-filter', [
            'rooms' => $rooms,
            'searchTerm' => $searchTerm,
            'province' => $province,
            'district' => $district,
            'village' => $village,
            'category' => $category, // Truyền category đã chọn vào view
            'type' => $type, // Truyền loại phòng sang view
            'provinces' => $locations['provinces'],
            'districts' => $locations['districts'],
            'villages' => $locations['villages'],
            'categories' => $categories, // Truyền danh sách categories vào view
            'popularRooms' => $popularRooms,
            'features' => $features
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
        $locations = $this->roomClientService->getUniqueLocations();
        $categories = $this->roomClientService->getCategories();
        // Tăng lượt xem cho phòng
        $this->roomClientService->incrementViewCount($roomDetails['room']->id);
        // Trong controller
        $similarRooms = $this->roomClientService->getRoomClient($province, $roomDetails['room']->id);

        // Lấy thông tin tiện ích cho từng phòng
        foreach ($similarRooms as $room) {
            $utilitiesRoom[] = $room->utility;
        }
        // Kiểm tra xem yêu cầu có phải là AJAX hay không
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'room' => $roomDetails['room'],
                'averageRating' => $roomDetails['averageRating'],
                'ratingsDistribution' => $roomDetails['ratingsDistribution'],
                // 'comments' => $comments,
                'user' => $user,
                'identity' => $identity,
                'zone' => $zone,
                'utilities' => $utilities,
                'similarRooms' => $similarRooms,
                'slug' => $slug
            ]);
        }

        // Nếu không phải là AJAX, trả về view
        return view('client.show.single-propety', [
            'categories' => $categories,
            'rooms' => $roomDetails['room'],
            'averageRating' => $roomDetails['averageRating'],
            'ratingsDistribution' => $roomDetails['ratingsDistribution'],
            'comments' => $comments,
            'user' => $user,
            'identity' => $identity,
            'zone' => $zone,  // Truyền thông tin zone sang view
            'utilities' => $utilities,
            'similarRooms' => $similarRooms,
            'provinces' => $locations['provinces'],
            'province' => request()->input('province', '')
        ]);
    }


    // public function addFavourite(Request $request, $slug)
    // {
    //     // Kiểm tra nếu người dùng chưa đăng nhập
    //     if (!$request->user()) {
    //         return redirect()->back()->with('error', 'User not authenticated');
    //     }

    //     $userId = $request->user()->id;

    //     // Tìm phòng theo slug
    //     $room = Room::where('slug', $slug)->first();

    //     // Nếu không tìm thấy phòng
    //     if (!$room) {
    //         return redirect()->back()->with('error', 'Room not found');
    //     }

    //     $roomId = $room->id;

    //     // Thêm hoặc cập nhật thông tin vào bảng favourites
    //     Favourite::updateOrCreate(
    //         ['user_id' => $userId, 'room_id' => $roomId]
    //     );

    //     // Ghi thông tin vào log để kiểm tra
    //     Log::info('Added to favourites', [
    //         'user_id' => $userId,
    //         'room_id' => $roomId
    //     ]);

    //     // Trả về thông báo thành công và giữ nguyên trang
    //     return redirect()->back()->with('success', 'Phòng đã được thêm vào danh sách yêu thích thành công!');
    // }
    // public function addFavourite(Request $request, $slug)
    // {
    //     // Kiểm tra nếu người dùng chưa đăng nhập
    //     if (!$request->user()) {
    //         return response()->json(['error' => 'User not authenticated'], 401);
    //     }

    //     $userId = $request->user()->id;

    //     // Tìm phòng theo slug
    //     $room = Room::where('slug', $slug)->first();

    //     // Nếu không tìm thấy phòng
    //     if (!$room) {
    //         return response()->json(['error' => 'Room not found'], 404);
    //     }

    //     $roomId = $room->id;

    //     // Kiểm tra xem phòng đã được yêu thích chưa
    //     $favourite = Favourite::where('user_id', $userId)->where('room_id', $roomId)->first();

    //     if ($favourite) {
    //         // Nếu đã yêu thích, xóa khỏi danh sách yêu thích
    //         $favourite->delete();
    //         $status = 'removed';
    //     } else {
    //         // Nếu chưa yêu thích, thêm vào danh sách yêu thích
    //         Favourite::create([
    //             'user_id' => $userId,
    //             'room_id' => $roomId
    //         ]);
    //         $status = 'added';
    //     }

    //     // Đếm số lượng yêu thích hiện tại của người dùng
    //     $favouriteCount = Favourite::where('user_id', $userId)->count();

    //     // Ghi thông tin vào log để kiểm tra
    //     Log::info('Favourite status changed', [
    //         'user_id' => $userId,
    //         'room_id' => $roomId,
    //         'status' => $status
    //     ]);

    //     // Trả về phản hồi JSON
    //     return response()->json([
    //         'status' => $status,
    //         'favoriteCount' => $favouriteCount,
    //         'message' => $status === 'added' ? 'Phòng đã được thêm vào danh sách yêu thích!' : 'Phòng đã được xóa khỏi danh sách yêu thích!'
    //     ]);
    // }
    public function addFavourite(Request $request, $slug)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!$request->user()) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $userId = $request->user()->id;

        // Tìm zone theo slug
        $zone = Zone::where('slug', $slug)->first();

        // Nếu không tìm thấy zone
        if (!$zone) {
            return response()->json(['error' => 'Zone not found'], 404);
        }

        $zoneId = $zone->id; // Lấy ID của zone

        // Kiểm tra xem zone đã được yêu thích chưa
        $favourite = Favourite::where('user_id', $userId)->where('zone_id', $zoneId)->first();

        if ($favourite) {
            // Nếu đã yêu thích, xóa khỏi danh sách yêu thích
            $favourite->delete();
            $status = 'removed';
        } else {
            // Nếu chưa yêu thích, thêm vào danh sách yêu thích
            Favourite::create([
                'user_id' => $userId,
                'zone_id' => $zoneId // Đảm bảo rằng bạn đang thêm zone_id
            ]);
            $status = 'added';
        }

        // Đếm số lượng yêu thích hiện tại của người dùng
        $favouriteCount = Favourite::where('user_id', $userId)->count();

        // Ghi thông tin vào log để kiểm tra
        Log::info('Favourite status changed', [
            'user_id' => $userId,
            'zone_id' => $zoneId,
            'status' => $status
        ]);

        // Trả về phản hồi JSON
        return response()->json([
            'status' => $status,
            'favoriteCount' => $favouriteCount,
            'message' => $status === 'added' ? 'Zone đã được thêm vào danh sách yêu thích!' : 'Zone đã được xóa khỏi danh sách yêu thích!'
        ]);
    }

    public function getRoomInCategory(Request $request)
    {
        $rooms = $this->roomClientService->getAllRoomInCategory();
        return response()->json(['rooms' => $rooms]);
    }
    public function indexRoomAPI(Request $request, $perPage = 10)
    {
        $rooms = $this->roomClientService->getAllRoomAPI();
        return response()->json([
            'rooms' => $rooms,
        ]);
    }
    // public function page_detail_admin($slug)
    // {
    //     $roomDetails = $this->CommentClientService->getRoomDetailsWithRatings($slug);
    //     $user = $roomDetails['room']->user;

    //     $userId = auth()->id();
    //     $identity = Identity::where('user_id', $userId)->first();

    //     $zone = $roomDetails['room']->zone;

    //     $comments = $roomDetails['comments'];

    //     $utilities = $roomDetails['room']->utility;
    //     $province = $roomDetails['room']->province;
    //     $locations = $this->roomClientService->getUniqueLocations();
    //     $categories = $this->roomClientService->getCategories();
    //     // Tăng lượt xem cho phòng
    //     $this->roomClientService->incrementViewCount($roomDetails['room']->id);
    //     // Trong controller
    //     $similarRooms = $this->roomClientService->getRoomClient($province, $roomDetails['room']->id);

    //     // Lấy thông tin tiện ích cho từng phòng
    //     foreach ($similarRooms as $room) {
    //         $utilitiesRoom[] = $room->utility;
    //     }
    //     // Kiểm tra xem yêu cầu có phải là AJAX hay không
    //     if (request()->ajax() || request()->wantsJson()) {
    //         return response()->json([
    //             'room' => $roomDetails['room'],
    //             'averageRating' => $roomDetails['averageRating'],
    //             'ratingsDistribution' => $roomDetails['ratingsDistribution'],
    //             // 'comments' => $comments,
    //             'user' => $user,
    //             'identity' => $identity,
    //             'zone' => $zone,
    //             'utilities' => $utilities,
    //             'similarRooms' => $similarRooms,
    //             'slug' => $slug
    //         ]);
    //     }

    //     // Nếu không phải là AJAX, trả về view
    //     return view('client.show.single-propety', [
    //         'categories' => $categories,
    //         'rooms' => $roomDetails['room'],
    //         'averageRating' => $roomDetails['averageRating'],
    //         'ratingsDistribution' => $roomDetails['ratingsDistribution'],
    //         'comments' => $comments,
    //         'user' => $user,
    //         'identity' => $identity,
    //         'zone' => $zone,  // Truyền thông tin zone sang view
    //         'utilities' => $utilities,
    //         'similarRooms' => $similarRooms,
    //         'provinces' => $locations['provinces'],
    //         'province' => request()->input('province', '')
    //     ]);
    // }
}
