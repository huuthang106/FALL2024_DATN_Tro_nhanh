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

class RoomOwnersController extends Controller
{
    //
    protected $roomOwnersService;

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
    public function index()
    {
        return view('owners.show.dashboard-my-properties');
    }
    public function __construct(RoomOwnersService $roomOwnersService)
    {
        $this->roomOwnersService = $roomOwnersService;
    }

    public function store(RoomOwnersRequest $request)
    {
        // try {
        //     if ($request->isMethod('post')) {
        //         $room = $this->roomOwnersService->create($request);
        //         return response()->json([
        //             'success' => true,
        //             'message' => 'Phòng trọ đã được tạo thành công.',
        //             'room' => $room
        //         ], 201);
        //     }
        // } catch (Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Đã có lỗi xảy ra',
        //         'error' => $e->getMessage()
        //     ], 500);
        // }
        try {
            if ($request->isMethod('post')) {
                $room = $this->roomOwnersService->create($request);
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
}
