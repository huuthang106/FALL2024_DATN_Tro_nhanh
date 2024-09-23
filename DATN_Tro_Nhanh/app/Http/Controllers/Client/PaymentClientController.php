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
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use App\Services\CassoService;

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
    protected $cassoService;

    public function __construct(PaymentService $paymentService, CartService $cartService, CassoService $cassoService)
    {
        $this->paymentService = $paymentService;
        $this->cartService = $cartService;
        $this->cassoService = $cassoService;
    }

    public function showRecharge()
    {
        $user = Auth::user();
        $qrCodeUrl = $this->cassoService->generateQrCodeUrl();
    
        return view('owners.show.dashboard-recharge', compact('qrCodeUrl','user'));
    }
    
    private function crc16($str)
    {
        $crc = 0xFFFF;
        for ($i = 0; $i < strlen($str); $i++) {
            $crc ^= ord($str[$i]);
            for ($j = 0; $j < 8; $j++) {
                if ($crc & 0x0001) {
                    $crc = ($crc >> 1) ^ 0xA001;
                } else {
                    $crc >>= 1;
                }
            }
        }
        return $crc & 0xFFFF;
    }

    

    // Giao diện chuẩn bị thanh toán
    public function showCheckout(Request $request)
    {
        $userId = Auth::id();
        $user = Auth::user();
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
            'totalPrice' => $totalPrice,
            'user' => $user
        ]);
    }
  
    public function checkout()
    {
        // Gọi service để xử lý thanh toán
        $result = $this->paymentService->processCheckout();
        
        // Kiểm tra kết quả thanh toán
        if ($result['success']) {
            // Lấy thông tin thanh toán
            $payment = $this->paymentService->getPaymentDetails();
            
            // Kiểm tra nếu thông tin thanh toán không có giá trị null
            if ($payment) {
                // Trả về view hiển thị thông báo thanh toán thành công
                return view('client.show.payment-successful', [
                    'payment' => $payment,
                    'message' => 'Thanh toán thành công!',
                ]);
            } else {
                // Trường hợp không lấy được thông tin thanh toán
                // Trường hợp không lấy được thông tin thanh toán
            return redirect()->route('client.payment.failure')->with('error', 'Không thể lấy thông tin thanh toán.');
            }
        } else {
            // Redirect với thông báo lỗi nếu thanh toán thất bại
        // Redirect đến trang thanh toán với thông báo lỗi
        return redirect()->route('client.payment.failure')->with('error', $result['message']);

        }
    }

    
    


    // // Khi Thanh toán thành công
    // public function showPaymentSuccess()
    // {
    //     // Lấy thông tin thanh toán
    //     $payment = $this->paymentService->getPaymentDetails();

    //     // // Gọi hàm để xóa các price list đã thanh toán khỏi giỏ hàng
    //     // $this->paymentService->clearPaidPriceLists($paymentId);

    //     // Trả về view hiển thị thông báo thanh toán thành công
    //     return view('client.show.payment-successful', compact('payment'));
    // }

    // Khi thanh toán thất bại
    public function showPaymentFailure()
    {
        return view('client.show.page-404');
    }
}
