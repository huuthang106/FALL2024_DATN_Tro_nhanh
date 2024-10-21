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

class ResidentClientController extends Controller
{
    protected $residentService;
    protected $roomServices;
    protected $userClientServices;
    protected $zoneServices;
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

        // dd($request->price);
        $updateRoom = $this->roomServices->updateQuantity($request->room_id, $request->quantity);
        //  dd($updateRoom);
        $roomPrice = $this->roomServices->getRoomPrice($request->room_id);
        $amount = $roomPrice->price * 0.5;
        //    dd( $amount);
        if ($updateRoom) {
            if ($roomPrice) {
                // Tính 50% giá phòng
                $check_balance = $this->userClientServices->updateBalance(Auth::user()->id, $amount);
                $owner_id = $this->zoneServices->getOwnerId($request->zone_id);
                // dd($check_balance);
                if ($check_balance) {
                    // Nếu số dư đủ, lưu thông tin cư dân
                    $this->residentService->storeResident($request->all(), Auth::user()->id, $owner_id, $amount);
                    // lưu thông tin giao dịch 
                    event(new BalanceDeductedEvent(
                        Auth::user()->id,          // userId
                        $amount,                  // Số tiền biến động (âm nếu trừ tiền)
                        'Đặt cọc tiền phòng ' . $roomPrice->title,               // Loại giao dịch
                        'Đặt phòng', // Mô tả
                        $check_balance->balance      // Số dư hiện tại của người dùng sau khi trừ
                    ));
    
                    return redirect()->back()->with('success', 'Đặt phòng thành công! Vui lòng liên hệ với chủ sở hữu.');
                } else {
                    // Nếu số dư không đủ, trả về thông báo lỗi
                    return redirect()->back()->with('error', 'Số dư không đủ.');
                }
            }
        }
        else {
            return redirect()->back()->with('error', 'Hết phòng.'); // Thông báo khi không còn phòng
        }
        
    }
}
