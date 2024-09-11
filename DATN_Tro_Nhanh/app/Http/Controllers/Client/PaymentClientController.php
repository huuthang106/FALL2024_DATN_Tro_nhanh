<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Services\CartService;
use App\Models\CartDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PaymentClientController extends Controller
{
    //
    // public function index()
    // {
    //     return view('client.show.payment');
    // }
    // public function show()
    // {
    //     return view('client.show.payment-successful');
    // }
    protected $paymentService;
    protected $cartService;

    public function __construct(PaymentService $paymentService, CartService $cartService)
    {
        $this->paymentService = $paymentService;
        $this->cartService = $cartService;
    }
    // Giao diện chuẩn bị thanh toán
    public function showCheckout(Request $request)
    {
        $userId = Auth::id();
        
        // Lấy danh sách các cart_id được chọn
        $selectedCartIds = $request->input('cart_ids', []);
        $totalPrice = $request->input('total_price');
        // dd($totalPrice);
        // Gọi service để xử lý thanh toán
        $paymentProcessed = $this->cartService->processPayment($selectedCartIds, $userId);

        if (!$paymentProcessed) {
            return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
        }

        $cartItems = $this->cartService->getCartDetails();
        
        return view('client.show.payment', [
            'cartItems' => $cartItems, 
            'totalPrice' => $totalPrice
        ]);
    }
    // Tạo thanh toán
//     public function processPayment(Request $request)
//     { // Kiểm tra giá trị trước khi tạo thanh toán

//         $payment = $this->paymentService->createPayment($request, auth()->id());
       
//         if (!$payment) {
//             return redirect()->route('client.payment')->with('error', 'Giỏ hàng trống hoặc có lỗi xảy ra');
//         }
      
//         $vnpayUrl = $this->paymentService->createVNPayUrl($payment);
// // dd($vnpayUrl);
//         return redirect($vnpayUrl);
//     }
public function processPayment(Request $request)
{
    // Lấy thông tin thanh toán và tổng số tiền
    $paymentData = $this->paymentService->createPayment($request, auth()->id());

    // dd($paymentData);
    if (!$paymentData) {
        return redirect()->route('client.payment')->with('error', 'Giỏ hàng trống hoặc có lỗi xảy ra');
    }

    // $payment = $paymentData['payment'];
    $totalAmount = $paymentData['totalAmount'];
    $carts = $paymentData['carts']; // Lấy danh sách các giỏ hàng
    // Chuyển đổi tổng số tiền thành số tiền cần gửi đến VNPay (VND * 100)
     // Lấy id của các carts
     $cartIds = $carts->pluck('id'); // Lấy mảng các id của carts
     
    $vnp_Amount = $totalAmount;
   
    // Tạo URL VNPay với tổng số tiền
    $vnpayUrl = $this->paymentService->createVNPayUrl($carts, $vnp_Amount,$cartIds);
    // dd($vnpayUrl);
   

    return redirect($vnpayUrl);
}

    // Trả về VNPay
    // public function vnpayReturn(Request $request)
    // {
    //     $processedPayment = $this->paymentService->processVNPayReturn($request);

    //     if ($processedPayment) {
    //         return redirect()->route('client.payment.success', $processedPayment->id);
    //     } else {
    //         return redirect()->route('client.payment.failure');
    //     }
    // }
//     public function vnpayReturn(Request $request)
// {
//     // Xử lý thanh toán trả về từ VNPay
//     $processedPayment = $this->paymentService->processVNPayReturn($request);

//     if ($processedPayment) {
//         // Thanh toán thành công, lưu dữ liệu vào bảng `transactions`
//         DB::beginTransaction();
//         try {
//             // Lưu giao dịch vào bảng `transactions`
//             $transaction = new Transaction();
//             $transaction->user_id = Auth::id();  // ID của user thanh toán
//             $transaction->added_funds = $processedPayment->total_price;  // Tổng số tiền đã thanh toán
//             $transaction->description = "Thanh toán giỏ hàng #{$processedPayment->id} qua VNPay";
//             $transaction->status = 'completed';
//             $transaction->bill_id = $processedPayment->id; // ID của payment (bill)
//             $transaction->save();

//             // Lưu các chi tiết giỏ hàng vào bảng `cart_details`
//             foreach ($processedPayment->cartItems as $cartItem) {
//                 $cartDetail = new CartDetail();
//                 $cartDetail->name_price_list = $cartItem->priceList->description;
//                 $cartDetail->description = $cartItem->priceList->description;
//                 $cartDetail->name_location = $cartItem->location->name; // Nếu có location liên kết
//                 $cartDetail->end_date = $cartItem->end_date;
//                 $cartDetail->price = $cartItem->price;
//                 $cartDetail->cart_id = $cartItem->id;
//                 $cartDetail->save();
//             }

//             // Xóa các mặt hàng đã thanh toán khỏi giỏ hàng của người dùng
//             $this->paymentService->clearPaidPriceLists($processedPayment->id);

//             DB::commit();

//             return redirect()->route('client.payment.success', $processedPayment->id)
//                              ->with('success', 'Thanh toán thành công!');
//         } catch (\Exception $e) {
//             DB::rollBack();
//             Log::error('Lỗi trong quá trình xử lý thanh toán: ' . $e->getMessage());
//             return redirect()->route('client.payment.failure')
//                              ->with('error', 'Có lỗi xảy ra trong quá trình xử lý thanh toán.');
//         }
//     } else {
//         // Nếu thanh toán thất bại
//         return redirect()->route('client.payment.failure')
//                          ->with('error', 'Thanh toán thất bại.');
//     }
// }

public function vnpayReturn(Request $request)
{
    // Gọi phương thức xử lý từ service
    $result = $this->paymentService->processVNPayReturn($request);

    if ($result) {
        // Thanh toán thành công
        return redirect()->route('client.payment.success')
                         ->with('success', 'Thanh toán thành công!');
    } else {
        // Thanh toán thất bại
        return redirect()->route('client.payment.failure')
                         ->with('error', 'Thanh toán thất bại, vui lòng thử lại.');
    }
}


    // Khi Thanh toán thành công
    public function showPaymentSuccess()
    {
        // Lấy thông tin thanh toán
        $payment = $this->paymentService->getPaymentDetails();

        // // Gọi hàm để xóa các price list đã thanh toán khỏi giỏ hàng
        // $this->paymentService->clearPaidPriceLists($paymentId);

        // Trả về view hiển thị thông báo thanh toán thành công
        return view('client.show.payment-successful', compact('payment'));
    }

    // Khi thanh toán thất bại
    public function showPaymentFailure()
    {
        return view('client.show.page-404');
    }
}
