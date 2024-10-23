<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use App\Services\RoomOwnersService;
use App\Http\Requests\RoomOwnersRequest;
use App\Http\Requests\UpdateroomRequests;

use Exception;
use App\Models\Acreage;
use App\Models\Price;
use App\Models\Category;
use App\Models\PriceList;
use App\Models\Transaction;

use App\Models\Location;
use App\Models\Zone;
use App\Services\ZoneServices;
use App\Models\Image;
use Illuminate\Validation\ValidationException;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Services\RoomServices; // Đảm bảo import RoomService
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class RoomOwnersController extends Controller
{
    protected $roomService;
    protected $roomOwnersService;
    protected $zoneServices;




    // Khởi tạo RoomService
    public function __construct(RoomServices $roomService, RoomOwnersService $roomOwnersService, ZoneServices $zoneServices)
    {
        $this->roomService = $roomService;
        $this->roomOwnersService = $roomOwnersService;
        $this->zoneServices = $zoneServices;
    }
    /**
     * Hiển thị danh sách phòng cho người dùng đang đăng nhập.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Tìm kiếm và sắp xếp từ yêu cầu
        $searchQuery = $request->input('search');
        $sortBy = $request->input('sort-by', 'title'); // Mặc định theo tiêu đề
    
        // Gọi service
        $rooms = $this->roomOwnersService->getRooms($searchQuery, $sortBy);
        $priceList = $this->roomOwnersService->getPriceList();
    
        // Lấy số lượng phòng
        $roomCount = $this->roomOwnersService->getRoomCount();
    
        return view('owners.show.dashboard-my-properties', [
            'rooms' => $rooms,
            'roomOwnersService' => $this->roomOwnersService,
            'roomCount' => $roomCount,
            'priceList' => $priceList
        ]);
    }
    //xoa room 
    public function deleteImage($id)
    {
        $result = $this->roomOwnersService->deleteImage($id);
        return response()->json($result);
    }

    public function showImages($id)
    {
        $data = $this->roomOwnersService->showImages($id);
        return view('owners.show.room-images', $data);
    }

    public function destroy($id)
    {
        $result = $this->roomOwnersService->softDeleteRoom($id);

        if ($result['status'] === 'error') {
            // Nếu có người ở, quay lại trang hiện tại với thông báo lỗi
            return redirect()->back()->with('error', $result['message']);
        }

        // Nếu xóa thành công, chuyển hướng đến trang thùng rác với thông báo thành công
        return redirect()->route('owners.trash')->with('success', 'Phòng đã được chuyển vào thùng rác.');
    }


    public function trash()
    {
        $trashedRooms = $this->roomOwnersService->getTrashedRooms();
        return view('owners.trash.trash-room', ['trashedRooms' => $trashedRooms, 'roomOwnersService' => $this->roomOwnersService]);
    }

    public function restore($id)
    {
        $this->roomOwnersService->restoreRoom($id);
        return redirect()->route('owners.properties')->with('success', 'Phòng đã được khôi phục.');
    }
    public function restoreMultiple(Request $request)
    {
        $ids = $request->input('ids', []);
        $this->roomOwnersService->restoreMultipleRooms($ids);
        return redirect()->route('owners.properties')->with('success', 'Các phòng đã được khôi phục.');
    }
    public function forceDelete($id)
    {
        $this->roomOwnersService->forceDeleteRoom($id);
        return redirect()->route('owners.trash')->with('success', 'Phòng đã được xóa vĩnh viễn.');
    }
    // Trả về view thêm phòng
    public function page_add_rooms($slug)
    {

        $zone = $this->zoneServices->getIdZone($slug);

        $userLock = auth()->user();

        // Lấy trạng thái của người dùng hiện tại
        $userStatus = $userLock ? $userLock->status : null;

        return view('owners.create.add-new-property', compact('zone', 'userStatus'));
    }

    // Trang chỉnh sửa
    public function viewUpdate($slug)
    {
        if (Auth::check() && Auth::user()->role != 1) {
            $room = $this->roomOwnersService->getIdRoom($slug);
            // $categories = $this->roomOwnersService->getAllCategories();

            // $prices = $this->roomOwnersService->getAllPrices();
            // $locations = $this->roomOwnersService->getAllLocations();
            $zones = $this->zoneServices->getMyZone(Auth::user()->id);
            // $images = $this->roomOwnersService->getRoomImages($room->id); // Lấy hình ảnh của phòng
            // $utilities = $this->roomOwnersService->getRoomUtilities($room->id); // Lấy tiện ích của phòng
            return view('owners.edit.update-property', [
                'room' => $room,
                // 'categories' => $categories,

                // 'prices' => $prices,
                // 'locations' => $locations,
                'zones' => $zones,
                // 'images' => $images,
                // 'utilities' => $utilities, // Truyền tiện ích vào view
            ]);
            // return view('owners.edit.update-property', compact('acreages', 'prices', 'categories', 'areas', 'locations', 'zones', 'roomTypes', 'room'));
        } else {
            return redirect()->route('client.home');
        }
    }
    // Cập nhật
    public function update(UpdateroomRequests $request, $roomId)
    {
        try {
            $result = $this->roomOwnersService->update($request, $roomId);

            if ($result['success']) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Phòng đã được cập nhật thành công.',
                    'redirect' => route('owners.properties')
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $result['message'] ?? 'Có lỗi xảy ra khi cập nhật phòng.'
                ]);
            }
        } catch (\Exception $e) {
            \Log::error('Lỗi khi cập nhật phòng: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi cập nhật phòng: ' . $e->getMessage()
            ]);
        }
    }
    // Hiển thị tất cả phòng
    public function showAllRooms()
    {
        try {
            // Lấy danh sách phòng từ RoomService
            $rooms = $this->roomService->getAllRooms(10);
            return view('owners.show.all-rooms', ['rooms' => $rooms]);
        } catch (Exception $e) {
            Log::error('Không thể lấy danh sách phòng: ' . $e->getMessage());
            // Xử lý lỗi hoặc trả về một thông báo lỗi
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi lấy danh sách phòng.');
        }
    }
    public function house_is_staying()
    {
        $userResident = $this->roomOwnersService->getUserResident();
        return view('owners.show.house_is_staying', ['userResident' => $userResident]);
    }

    public function processPayment(Request $request)
    {
        // Lấy các giá trị từ request
        $accommodationId = $request->input('room_id');
        $vipPackageId = $request->input('vipPackage');

        // Lấy thông tin phòng và người dùng hiện tại
        $accommodation = Room::findOrFail($accommodationId);
        $customer = auth()->user();

        // Lấy thông tin gói VIP từ priceList
        $pricing = PriceList::findOrFail($vipPackageId);
        $cost = $pricing->price;

        // Kiểm tra số dư tài khoản của user
        if ($customer->balance < $cost) {
            \Log::warning('Số dư tài khoản không đủ để thanh toán. User ID: ' . $customer->id);
            return redirect()->back()->with('error', 'Số dư tài khoản không đủ để thanh toán.');
        }


        // Gọi service để thực hiện thanh toán
        $paymentStatus = $this->roomOwnersService->processRoomPayment($customer, $accommodation, $vipPackageId);

        if ($paymentStatus) {
            return redirect()->back()->with('success', 'Thanh toán thành công và gói VIP đã được kích hoạt.');
        } else {
            \Log::error('Thanh toán không thành công. User ID: ' . $customer->id . ', Room ID: ' . $accommodationId);
            return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình thanh toán.');
        }
    }

    public function store(RoomOwnersRequest $request, $id)
{
    $zone_slug = $this->zoneServices->getSlug($id);
    $result = $this->roomOwnersService->create($request->all(), $id);

    // Trả về view chỉnh sửa với thông tin phòng
    return view('owners.edit.edit-property', compact('room'));
}
    // RoomController.php
    public function updateRoom(Request $request, $id)
    {
        Log::info("Starting update for room ID: $id");
    
        // Gọi service để cập nhật phòng
        $result = $this->roomOwnersService->updateRoomInZone($request, $id);
    
        // Lấy phòng để lấy slug của khu trọ
        $room = Room::findOrFail($id);
        $zoneSlug = $room->zone->slug; // Giả sử Room có mối quan hệ với Zone
    
        if ($result) {
            Log::info("Successfully updated room ID: $id");
            return redirect()->route('owners.detail-zone', ['slug' => $zoneSlug])
                             ->with('success', 'Cập nhật phòng thành công!');
        } else {
            Log::error("Failed to update room ID: $id");
            return redirect()->route('owners.detail-zone', ['slug' => $zoneSlug])
                             ->with('error', 'Cập nhật phòng thất bại!');
        }
    }

    public function storeRoom(Request $request, $zoneId)
    {
        try {
            // Gọi service để tạo phòng mới
            $result = $this->roomOwnersService->createRoom($request, $zoneId);
    
            if ($result['success']) {
                return redirect()->route('owners.detail-zone', ['slug' => $result['zone_slug']])
                                 ->with('success', 'Phòng trọ đã được tạo thành công.');
            } else {
                return redirect()->back()->with('error', $result['message']);
            }
        } catch (\Exception $e) {
            \Log::error('Lỗi khi tạo phòng: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo phòng.');
        }
    }
}
