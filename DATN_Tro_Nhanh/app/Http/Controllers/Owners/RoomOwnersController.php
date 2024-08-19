<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use App\Services\RoomOwnersService;
use App\Http\Requests\RoomOwnersRequest;
use Exception;
use App\Models\Acreage;
use App\Models\Price;
use App\Models\Category;
use App\Models\Area;
use App\Models\Location;
use App\Models\Zone;
use App\Models\RoomType;
use Illuminate\Validation\ValidationException;
use App\Events\Owners\RoomOwnersEvent;




use Illuminate\Http\Request;
use App\Services\RoomServices; // Đảm bảo import RoomService
use Illuminate\Support\Facades\Log;

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

    // Trả về view thêm phòng
    public function page_add_rooms()
    {
        $acreages = Acreage::all();
        $prices = Price::all();
        $categories = Category::all();
        $areas = Area::all();
        $locations = Location::all();
        $zones = Zone::all();
        $roomTypes = RoomType::all();
        return view('owners.create.add-new-property', compact('acreages', 'prices', 'categories', 'areas', 'locations', 'zones', 'roomTypes'));
    }

    // Trả về view dashboard của người dùng
    public function index()
    {
        return view('owners.show.dashboard-my-properties');
    }


    public function store(RoomOwnersRequest $request)
    {
        try {
            if ($request->isMethod('post')) {
                $room = $this->roomOwnersService->create($request);

                // // Dispatch the event for room creation
                // event(new RoomOwnersEvent(
                //     $room, // Pass the created room object
                //     'Đăng trọ', // Type
                //     'Bạn vừa đăng trọ thành công.', // Data
                //     1, // Status for success
                //     auth()->id() // User ID
                // ));
                // Phát sự kiện RoomOwnersEvent và truyền đối tượng room mới tạo
                event(new RoomOwnersEvent($room));

                return response()->json([
                    'success' => true,
                    'message' => 'Phòng trọ đã được tạo thành công.',
                    'room' => $room
                ], 201);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng nhập đầy đủ thông tin.', // Thay đổi thông báo lỗi ở đây
                'errors' => $e->errors() // Có thể bỏ cái này nếu không cần gửi chi tiết lỗi
            ], 422); // Sử dụng mã lỗi 422 cho lỗi validation
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    // Hiển thị tất cả phòng
    public function showAllRooms()
    {
        try {
            // Lấy danh sách phòng từ RoomService
            $rooms = $this->roomService->getAllRooms(10);

            return view('owners.show.all-rooms', ['rooms' => $rooms]);
        } catch (\Exception $e) {
            Log::error('Không thể lấy danh sách phòng: ' . $e->getMessage());
            // Xử lý lỗi hoặc trả về một thông báo lỗi
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi lấy danh sách phòng.');
        }
    }
}
