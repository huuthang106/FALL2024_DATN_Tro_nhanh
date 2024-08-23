<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use App\Services\RoomOwnersService;
use App\Http\Requests\RoomOwnersRequest;
use Exception;
use App\Models\Acreage;
use App\Models\Price;
use App\Models\Category;

use App\Models\Location;
use App\Models\Zone;

use Illuminate\Validation\ValidationException;
use App\Events\Owners\RoomOwnersEvent;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Services\RoomServices; // Đảm bảo import RoomService
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RoomOwnersController extends Controller
{
    protected $roomService;
    protected $roomOwnersService;

    // Khởi tạo RoomService
    public function __construct(RoomServices $roomService, RoomOwnersService $roomOwnersService)
    {
        $this->roomService = $roomService;
        $this->roomOwnersService = $roomOwnersService;
    }
    /**
     * Hiển thị danh sách phòng cho người dùng đang đăng nhập.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $userId = Auth::id();
        // Tìm kiếm và sắp xếp từ yêu cầu
        $searchQuery = $request->input('search');
        $sortBy = $request->input('sort-by', 'title'); // Mặc định theo tiêu đề
        // Gọi service
        $rooms = $this->roomOwnersService->getRooms($userId, $searchQuery, $sortBy);
        // Lấy số lượng phòng của người dùng hiện tại
        $roomCount = $this->roomOwnersService->getRoomCount($userId);
        return view('owners.show.dashboard-my-properties', [
            'rooms' => $rooms,
            'roomOwnersService' => $this->roomOwnersService,
            'roomCount' => $roomCount,
        ]);
    }
    // Trả về view thêm phòng
    public function page_add_rooms()
    {
        $acreages = Acreage::all();
        $prices = Price::all();
        $categories = Category::all();
    
        $locations = Location::all();
        $zones = Zone::all();
     
        return view('owners.create.add-new-property', compact('acreages', 'prices', 'categories', 'locations', 'zones'));
    }
    public function store(RoomOwnersRequest $request)
    {
        if ($request->isMethod('post')) {
            $room = $this->roomOwnersService->create($request);
            if ($room) {
                // Phát sự kiện RoomOwners và truyền đối tượng Room mới tạo
                event(new RoomOwnersEvent($room));
                // Redirect to the desired route with a success message
                return redirect()->route('owners.properties')->with('success', 'Zone đã được tạo thành công.');
            } else {
                // Handle the case where room creation failed
                return redirect()->route('owners.add-room')->with('error', 'Đã xảy ra lỗi khi tạo Zone.');
            }
        }
        // Return a proper view if the request method is not POST
        return view('owners.properties');
    }
    // Trang chỉnh sửa
    public function viewUpdate($slug)
    {
        if (Auth::check() && Auth::user()->role != 1) {
            $room = $this->roomOwnersService->getIdRoom($slug);
            $categories = $this->roomOwnersService->getAllCategories();
            $roomTypes = $this->roomOwnersService->getAllRoomTypes();
            $prices = $this->roomOwnersService->getAllPrices();
            $locations = $this->roomOwnersService->getAllLocations();
            $zones = $this->roomOwnersService->getAllZones();
            $images = $this->roomOwnersService->getRoomImages($room->id); // Lấy hình ảnh của phòng
            return view('owners.edit.update-property', [
                'room' => $room,
                'categories' => $categories,
                'roomTypes' => $roomTypes,
                'prices' => $prices,
                'locations' => $locations,
                'zones' => $zones,
                'images' => $images,
            ]);
            // return view('owners.edit.update-property', compact('acreages', 'prices', 'categories', 'areas', 'locations', 'zones', 'roomTypes', 'room'));
        } else {
            return redirect()->route('client.home');
        }
    }
    // Cập nhật
    public function update(RoomOwnersRequest $request, $roomId)
    {
        // Gọi phương thức update từ service
        $room = $this->roomOwnersService->update($request, $roomId);
        if ($room) {
            // Phát sự kiện RoomOwners và truyền đối tượng phòng đã cập nhật
            // event(new RoomOwnersEvent($room));
            // Điều hướng đến trang hiển thị phòng
            return redirect()->route('owners.properties')->with('success', 'Phòng đã được cập nhật thành công.');
        } else {
            // Điều hướng đến trang cập nhật với thông báo lỗi
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật phòng.');
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
}
