<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class PaymentService
{
    protected $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    protected $vnp_TmnCode = "YZYXA9YP"; // Thay YOUR_TMNCODE bằng mã thực
    protected $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Thay YOUR_HASH_SECRET bằng khóa bí mật thực

    protected $vnpUrl;
    protected $vnpHashSecret;

    public function __construct()
    {
        $this->vnpUrl = Config::get('payment.vnp_url'); // URL của VNPay
        $this->vnpHashSecret = Config::get('payment.vnp_hash_secret'); // Secret key của VNPay
    }
    // VNPay
    public function createVNPayUrl($payment)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.vnpay.return');
        $vnp_TmnCode = "YZYXA9YP";  // Mã website tại VNPAY 
        $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật

        $vnp_TxnRef = $payment->id . "-" . Str::random(10); // Mã đơn hàng
        $vnp_OrderInfo = "Thanh toan cho don hang " . $payment->id;
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $payment->amount * 100; // Số tiền * 100
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url;
    }
    // VNPay
    public function processVNPayReturn($request)
    {
        $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật

        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash == $request->vnp_SecureHash) {
            if ($request->vnp_ResponseCode == '00') {
                $paymentId = explode('-', $request->vnp_TxnRef)[0];
                $payment = Payment::findOrFail($paymentId);
                $payment->status = '1';
                $payment->save();

                // Xóa giỏ hàng sau khi thanh toán thành công nhưng chưa có resident id nên chưa xóa dc ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ??
                Cart::where('user_id', $payment->resident_id)->delete();

                return $payment;
            }
        }

        return null;
    }
    // Tạo thanh toán lưu vào DB
    public function createPayment($userId)
    {
        $cart = Cart::where('user_id', $userId)->with('details')->first();

        if (!$cart || $cart->details->isEmpty()) {
            return null;
        }

        $totalAmount = $cart->details->sum('price');

        $payment = Payment::create([
            // 'resident_id' => $userId, trường này chưa có nên cmt lại
            'creator_id' => $userId,
            'payer_id' => $userId,
            'payment_date' => Carbon::now(),
            'amount' => $totalAmount,
            'description' => 'Thanh toán gói dịch vụ',
            'status' => '1'
        ]);

        // Có thể thêm logic để lưu chi tiết thanh toán nếu cần

        return $payment;
    }
    // Chi tiết thanh toán
    public function getPaymentDetails($paymentId)
    {
        return Payment::with(['resident', 'creator', 'payer'])->findOrFail($paymentId);
    }

    public function processPayment($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        // Xử lý thanh toán ở đây (có thể tích hợp với cổng thanh toán)
        $payment->status = 'completed';
        $payment->save();

        // Xóa giỏ hàng sau khi thanh toán thành công
        Cart::where('user_id', $payment->resident_id)->delete();

        return $payment;
    }
}
