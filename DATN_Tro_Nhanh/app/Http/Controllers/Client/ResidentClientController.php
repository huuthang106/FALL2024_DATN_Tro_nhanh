<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ResidentService;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\RoomServices;
use App\Services\UserClientServices;
use App\Services\ZoneServices;
use App\Events\BalanceDeductedEvent;
use App\Models\Room;

class ResidentClientController extends Controller
{
    protected $residentService;
    protected $roomServices;
    protected $userClientServices;
    protected $zoneServices;
    protected const deductmoney = 2;
    public function __construct(ResidentService $residentService, RoomServices $roomServices, UserClientServices $userClientServices, ZoneServices $zoneServices)
    {
        $this->residentService = $residentService;
        $this->roomServices = $roomServices;
        $this->userClientServices = $userClientServices;
        $this->zoneServices = $zoneServices;
    }
    public function storeResident(Request $request)
    {

        //    dd($request->all());
        if (!Auth::check()) {
            return response()->json(['error' => 'Bạn cần đăng nhập để đặt phòng.'], 401); // Trả về thông báo lỗi dưới dạng JSON với mã trạng thái 401
        }
        // dd($request->price);
        //  dd($updateRoom);
        $roomPrice = $this->roomServices->getRoomPrice($request->room_id);
        $amount = $roomPrice->price * 0.5;
        //    dd( $amount);
        $check_quantity = $this->roomServices->checkQuantity($request->room_id, $request->quantity);

        // if ($updateRoom) {
        if ($check_quantity) {
            if ($amount) {
                // Tính 50% giá phòng
                $check_balance = $this->userClientServices->updateBalance(Auth::user()->id, $amount);

                if ($check_balance) {
                    // Nếu số dư đủ, lưu thông tin cư dân
                    $updateRoom = $this->roomServices->updateQuantity($request->room_id, $request->quantity);
                    $owner_id = $this->zoneServices->getOwnerId($request->zone_id);
                    // dd($check_balance);
                    $this->residentService->storeResident($request->all(), Auth::user()->id, $owner_id, $amount);
                    // lưu thông tin giao dịch 
                    event(new BalanceDeductedEvent(
                        Auth::user()->id,          // userId
                        $amount,                  // Số tiền biến động (âm nếu trừ tiền)
                        'Đặt cọc tiền phòng ' . $roomPrice->title,               // Loại giao dịch
                        'Đặt phòng', // Mô tả
                        $check_balance->balance,
                        self::deductmoney       // Số dư hiện tại của người dùng sau khi trừ
                    ));

                    return response()->json(['message' => 'Đặt phòng thành công! Vui lòng liên hệ với chủ sở hữu.']); // Trả về thông báo thành công dưới dạng JSON
                } else {
                    // Nếu số dư không đủ, trả về thông báo lỗi
                    return response()->json(['error' => 'Số dư không đủ.'], 400); // Trả về thông báo lỗi dưới dạng JSON với mã trạng thái 400
                }
            } // Thông báo khi không còn phòng
        } else {
            return response()->json(['error' => 'Hết phòng.'], 400); // Trả về thông báo lỗi dưới dạng JSON với mã trạng thái 400
        }
    }
}
