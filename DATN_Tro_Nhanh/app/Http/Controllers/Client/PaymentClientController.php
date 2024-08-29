<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Services\CartService;
use App\Models\CartDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
    public function showCheckout()
    {
        $cartItems = $this->cartService->getCartDetails(auth()->id());
        return view('client.show.payment', compact('cartItems'));
    }
    // Tạo thanh toán
    public function processPayment(Request $request)
    { // Kiểm tra giá trị trước khi tạo thanh toán

        $payment = $this->paymentService->createPayment($request, auth()->id());

        if (!$payment) {
            return redirect()->route('client.payment')->with('error', 'Giỏ hàng trống hoặc có lỗi xảy ra');
        }

        $vnpayUrl = $this->paymentService->createVNPayUrl($payment);

        return redirect($vnpayUrl);
    }
    // Trả về VNPay
    public function vnpayReturn(Request $request)
    {
        $processedPayment = $this->paymentService->processVNPayReturn($request);

        if ($processedPayment) {
            return redirect()->route('client.payment.success', $processedPayment->id);
        } else {
            return redirect()->route('client.payment.failure');
        }
    }
    // Khi Thanh toán thành công
    public function showPaymentSuccess($paymentId)
    {
        // Lấy thông tin thanh toán
        $payment = $this->paymentService->getPaymentDetails($paymentId);

        // Gọi hàm để xóa các price list đã thanh toán khỏi giỏ hàng
        $this->paymentService->clearPaidPriceLists($paymentId);

        // Trả về view hiển thị thông báo thanh toán thành công
        return view('client.show.payment-successful', compact('payment'));
    }

    // Khi thanh toán thất bại
    public function showPaymentFailure()
    {
        return view('client.show.page-404');
    }
}
