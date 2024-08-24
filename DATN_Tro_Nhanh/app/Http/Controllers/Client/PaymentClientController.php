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
        $cartItems = $this->cartService->getCartItems(auth()->id());
        return view('client.show.payment', compact('cartItems'));
    }
    // Tạo thanh toán
    public function processPayment(Request $request)
    {
        $payment = $this->paymentService->createPayment(auth()->id());

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
        $payment = $this->paymentService->getPaymentDetails($paymentId);
        return view('client.show.payment-successful', compact('payment'));
    }
    // Khi thanh toán thất bại
    public function showPaymentFailure()
    {
        return view('client.show.page-404');
    }
}
