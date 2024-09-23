<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Room;
use App\Models\User;
use App\Models\PriceList;

class PaymentOwnersController extends Controller
{
    //
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    // public function showCurrentUserTransactions()
    // {
    //     $bills = $this->BillService->getCurrentUserBills();
    //     return view('owners.show.dashbroard-my-bill', compact('bills'));
    // }
    public function page_add_invoice()
    {
        return view('owners.create.add-new-invoice');
    }

    public function paymentPrice(Request $request)
    {
         // Lấy các giá trị từ request
    $roomId = $request->input('room_id');
    $priceListId = $request->input('vipPackage');

    // Lấy thông tin phòng và người dùng hiện tại
    $room = Room::findOrFail($roomId);
    $user = auth()->user();

    // Lấy thông tin gói VIP từ priceList
    $priceList = PriceList::findOrFail($priceListId);
    $price = $priceList->price; // Giả sử price là trường chứa giá tiền

    // Kiểm tra số dư tài khoản
    if ($user->balance < $price) {
        return redirect()->back()->with(['error' => 'Số dư tài khoản không đủ để thanh toán.']);
    }

    // Gọi service để thực hiện thanh toán
    $paymentStatus = $this->paymentService->handlePayment($user, $room, $priceListId);

    if (!$paymentStatus) {
        // Nếu thanh toán thành công, chuyển hướng đến trang thành công hoặc trang phòng
        return redirect()->back()->with('success', 'Thanh toán thành công và gói VIP đã được kích hoạt.');
    } else {
        // Nếu có lỗi thanh toán
        return redirect()->back()->withErrors(['error' => $paymentStatus['message']]);
    }
    }
}
