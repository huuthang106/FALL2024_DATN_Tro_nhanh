<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Premium;
use App\Models\User;
use App\Models\CartDetail;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Events\PaymentProcessed;

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
    // public function createVNPayUrl($payment)
    // {
    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = route('client.vnpay.return');
    //     $vnp_TmnCode = "YZYXA9YP";  // Mã website tại VNPAY 
    //     $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật

    //     // $vnp_TxnRef = $payment->id . "-" . Str::random(10); // Mã đơn hàng
    //     // $vnp_OrderInfo = "Thanh toan cho don hang " . $payment->id;
    //     $vnp_OrderType = "billpayment";
    //     $vnp_Amount = $ $vnp_Amount; // Số tiền * 100
    //     $vnp_Locale = 'vn';
    //     $vnp_IpAddr = request()->ip();
    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         // "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => date('YmdHis'),
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         // "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         // "vnp_TxnRef" => $vnp_TxnRef,
    //     );

    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    //     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

    //     return $vnp_Url;
    // }
//     public function createVNPayUrl($payment, $vnp_Amount,$cartIds)
// {
//     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
//     $vnp_Returnurl = route('client.vnpay.return');
//     $vnp_TmnCode = "YZYXA9YP";  // Mã website tại VNPAY 
//     $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật

    //     // Mã đơn hàng và thông tin đơn hàng
//     // $vnp_TxnRef = $cartIds . "-" . Str::random(10); // Mã đơn hàng
//     $vnp_TxnRef = implode('-', $cartIds) . "-" . Str::random(10); // Mã đơn hàng

    //     $vnp_OrderInfo = "Thanh toan cho don hang " . $cartIds;
//     $vnp_OrderType = "billpayment";
//     $vnp_Locale = 'vn';
//     $vnp_IpAddr = request()->ip();

    //     $inputData = array(
//         "vnp_Version" => "2.1.0",
//         "vnp_TmnCode" => $vnp_TmnCode,
//         "vnp_Amount" => $vnp_Amount * 100, // Số tiền * 100
//         "vnp_Command" => "pay",
//         "vnp_CreateDate" => date('YmdHis'),
//         "vnp_CurrCode" => "VND",
//         "vnp_IpAddr" => $vnp_IpAddr,
//         "vnp_Locale" => $vnp_Locale,
//         "vnp_OrderInfo" => $vnp_OrderInfo,
//         "vnp_OrderType" => $vnp_OrderType,
//         "vnp_ReturnUrl" => $vnp_Returnurl,
//         "vnp_TxnRef" => $vnp_TxnRef,
//     );

    //     ksort($inputData);
//     $query = "";
//     $i = 0;
//     $hashdata = "";
//     foreach ($inputData as $key => $value) {
//         if ($i == 1) {
//             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
//         } else {
//             $hashdata .= urlencode($key) . "=" . urlencode($value);
//             $i = 1;
//         }
//         $query .= urlencode($key) . "=" . urlencode($value) . '&';
//     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
//     $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
//     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

    //     return $vnp_Url;
// }
// public function createVNPayUrl($payment, $vnp_Amount, $cartIds)
// {
//     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
//     $vnp_Returnurl = route('client.vnpay.return');
//     $vnp_TmnCode = "YZYXA9YP";  // Mã website tại VNPAY 
//     $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật
//   // Chuyển đổi Collection thành array trước khi sử dụng implode
//   $cartIdsArray = $cartIds->toArray();
//     // Mã đơn hàng và thông tin đơn hàng
//     // $vnp_TxnRef = implode('-', $cartIds) . "-" . Str::random(10); // Mã đơn hàng
//     $vnp_TxnRef = implode('-', $cartIdsArray) . "-" . Str::random(10);
//     $vnp_OrderInfo = "Thanh toan cho don hang " . implode('-', $cartIdsArray);

    //     $vnp_OrderType = "billpayment";
//     $vnp_Locale = 'vn';
//     $vnp_IpAddr = request()->ip();

    //     $inputData = array(
//         "vnp_Version" => "2.1.0",
//         "vnp_TmnCode" => $vnp_TmnCode,
//         "vnp_Amount" => $vnp_Amount *100, // Số tiền * 100
//         "vnp_Command" => "pay",
//         "vnp_CreateDate" => date('YmdHis'),
//         "vnp_CurrCode" => "VND",
//         "vnp_IpAddr" => $vnp_IpAddr,
//         "vnp_Locale" => $vnp_Locale,
//         "vnp_OrderInfo" => $vnp_OrderInfo,
//         "vnp_OrderType" => $vnp_OrderType,
//         "vnp_ReturnUrl" => $vnp_Returnurl,
//         "vnp_TxnRef" => $vnp_TxnRef,
//     );

    //     ksort($inputData);
//     $query = "";
//     $i = 0;
//     $hashdata = "";
//     foreach ($inputData as $key => $value) {
//         if ($i == 1) {
//             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
//         } else {
//             $hashdata .= urlencode($key) . "=" . urlencode($value);
//             $i = 1;
//         }
//         $query .= urlencode($key) . "=" . urlencode($value) . '&';
//     }

    //     $vnp_Url = $vnp_Url . "?" . rtrim($query, '&'); // Loại bỏ dấu '&' cuối cùng
//     $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
//     $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;

    //     return $vnp_Url;
// }
    public function createVNPayUrl($payment, $vnp_Amount, $cartIds)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.vnpay.return');
        $vnp_TmnCode = "YZYXA9YP";  // Mã website tại VNPAY 
        $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật
// Chuyển đổi Collection thành array trước khi sử dụng implode
        $cartIdsArray = $cartIds->toArray();
        // Mã đơn hàng và thông tin đơn hàng
        // $vnp_TxnRef = implode('-', $cartIds) . "-" . Str::random(10); // Mã đơn hàng
        $vnp_TxnRef = implode('-', $cartIdsArray) . "-" . Str::random(10);
        // $vnp_OrderInfo = "Thanh toan cho don hang " . implode('-', $cartIds);
        $vnp_OrderInfo = "Thanh toan cho don hang " . implode('-', $cartIdsArray);
        $vnp_OrderType = "billpayment";
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100, // Số tiền * 100
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

        $query = rtrim($query, '&'); // Loại bỏ dấu '&' cuối cùng
        $vnp_Url = $vnp_Url . "?" . $query;
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url;
    }
    // VNPay
    // public function processVNPayReturn($request)
    // {
    //     $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật

    //     $inputData = array();
    //     foreach ($_GET as $key => $value) {
    //         if (substr($key, 0, 4) == "vnp_") {
    //             $inputData[$key] = $value;
    //         }
    //     }
    //     unset($inputData['vnp_SecureHash']);
    //     ksort($inputData);
    //     $i = 0;
    //     $hashData = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //     }

    //     $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    //     if ($secureHash == $request->vnp_SecureHash) {
    //         if ($request->vnp_ResponseCode == '00') {
    //             $paymentId = explode('-', $request->vnp_TxnRef)[0];
    //             $payment = Cart::findOrFail($paymentId);
    //             $payment->status = '1';
    //             $payment->save();

    //             // Xóa giỏ hàng sau khi thanh toán thành công nhưng chưa có resident id nên chưa xóa dc ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ?? ??
    //             Cart::where('user_id', $payment->user_id)->delete();

    //             return $payment;
    //         }
    //     }

    //     return null;
    // }
    // public function processVNPayReturn($request)
    // {
    //     $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật

    //     // Lấy thông tin từ request để xử lý
    //     $inputData = array();
    //     foreach ($_GET as $key => $value) {
    //         if (substr($key, 0, 4) == "vnp_") {
    //             $inputData[$key] = $value;
    //         }
    //     }
    //     unset($inputData['vnp_SecureHash']);
    //     ksort($inputData);

    //     $i = 0;
    //     $hashData = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //     }

    //     $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    //     if ($secureHash == $request->vnp_SecureHash) {
    //         if ($request->vnp_ResponseCode == '00') {
    //             // Lấy thông tin thanh toán từ vnp_TxnRef (giả sử định dạng là paymentId-productId-quantity)
    //             // $paymentId = explode('-', $request->vnp_TxnRef)[0];
    //             // $payment = Cart::findOrFail($paymentId);
    //             // $payment->status = '1';
    //             // $payment->save();
    //             $paymentIds = explode('-', $request->vnp_TxnRef);

    //             // Lấy tất cả các cart có status = 2 và paymentId trong danh sách
    //             $payments = Cart::whereIn('id', $paymentIds)
    //                 ->where('status', 2)  // Chỉ lấy các cart có status = 2
    //                 ->get();

    //             // Mảng để lưu trữ các CartDetail đã tạo
    //             $user_id = Auth::user()->id;
    //             foreach ($payments as $payment) {
    //                 $newCartDetail = new CartDetail();
    //                 $newCartDetail->name_price_list = 'Nâng cấp tài khoản';
    //                 $newCartDetail->description = $payment->priceList->description;
    //                 $newCartDetail->quantity = $payment->quantity;
    //                 $newCartDetail->price = $request->vnp_Amount / 100; // Giá từ cartItem
    //                 $newCartDetail->save();

    //                 $premium = new Premium();

    //                 $daysOfPackage = $payment->priceList->duration_day;

    //                 // Tính tổng số ngày (số ngày gói * số lượng gói)
    //                 $totalDays = $daysOfPackage * $payment->quantity;

    //                 // Cập nhật ngày kết thúc
    //                 $premium->end_day = Carbon::now()->addDays($totalDays);

    //                 // Cập nhật ngày hiện tại là ngày bắt đầu hoặc ngày cập nhật
    //                 $premium->update_day = Carbon::now();

    //                 // Lưu thông tin user_id (giả sử bạn có thông tin này)
    //                 $premium->user_id = $payment->user_id; // Cần thay thế bằng đúng user_id nếu có
                    
    //                 // Lưu bản ghi vào bảng premiums
    //                 $premium->save();
    //             }

    //              // Cập nhật thông tin VIP của người dùng
    // $user = User::find($user_id);
    // $user->has_vip_badge = true;
    // $user->vip_expiration_date = $premium->end_day;
    // $user->save();


    //             // Tạo bản ghi trong bảng transactions
    //             $transaction = new Transaction();
    //             $transaction->balance = '0';
    //             $transaction->description = 'Thanh toán hóa đơn';
    //             $transaction->total_price = $request->vnp_Amount / 100;
    //             $transaction->user_id = $user_id;
    //             // $transaction->cart_detail_id = implode(',', array_unique($priceListIds));
    //             $transaction->save();

    //             // Xóa giỏ hàng sau khi thanh toán thành công
    //             // Cart::where('user_id', $payment->user_id)->delete();
    //             foreach ($payments as $payment) {
    //                 // Sau khi thanh toán thành công, xóa cứng cart đó
    //                 $payment->delete();
    //             }

    //             return $payments;
    //         }
    //     }

    //     return null;
    // }

//     public function processVNPayReturn($request)
// {
//     $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Chuỗi bí mật

//     // Lấy thông tin từ request để xử lý
//     $inputData = array();
//     foreach ($_GET as $key => $value) {
//         if (substr($key, 0, 4) == "vnp_") {
//             $inputData[$key] = $value;
//         }
//     }
//     unset($inputData['vnp_SecureHash']);
//     ksort($inputData);

//     $i = 0;
//     $hashData = "";
//     foreach ($inputData as $key => $value) {
//         if ($i == 1) {
//             $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
//         } else {
//             $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
//             $i = 1;
//         }
//     }

//     $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

//     if ($secureHash == $request->vnp_SecureHash) {
//         if ($request->vnp_ResponseCode == '00') {
//             // Lấy danh sách ID giỏ hàng từ vnp_TxnRef
//             $paymentIds = explode('-', $request->vnp_TxnRef);

//             // Lấy tất cả các cart có status = 2 và paymentId trong danh sách
//             $payments = Cart::whereIn('id', $paymentIds)
//                 ->where('status', 2)  // Chỉ lấy các cart có status = 2
//                 ->get();

//             $user_id = Auth::user()->id;

//             foreach ($payments as $payment) {
//                 $newCartDetail = new CartDetail();
//                 $newCartDetail->name_price_list = 'Nâng cấp tài khoản';
//                 $newCartDetail->description = $payment->priceList->description;
//                 $newCartDetail->quantity = $payment->quantity;
//                 $newCartDetail->price = $request->vnp_Amount / 100; // Giá từ cartItem
//                 $newCartDetail->save();

//                 // Tìm hoặc tạo mới bản ghi Premium
//                 $premium = Premium::where('user_id', $user_id)->first();

//                 if ($premium) {
//                     // Nếu người dùng đã có gói VIP, cập nhật ngày kết thúc
//                     $daysOfPackage = $payment->priceList->duration_day;
//                     $totalDays = $daysOfPackage * $payment->quantity;
//                     $newEndDay = Carbon::now()->addDays($totalDays);
                
//                     // Chuyển đổi end_day từ chuỗi thành đối tượng Carbon
//                     $currentEndDay = Carbon::parse($premium->end_day);
                
//                     // Nếu ngày kết thúc hiện tại lớn hơn ngày kết thúc mới tính toán, thì không cần cập nhật
//                     if ($currentEndDay->greaterThan($newEndDay)) {
//                         $premium->end_day = $currentEndDay;
//                     } else {
//                         $premium->end_day = $newEndDay;
//                     }
                
//                     $premium->update_day = Carbon::now();
//                 } else {
//                     // Nếu người dùng chưa có gói VIP, tạo mới
//                     $premium = new Premium();
//                     $premium->user_id = $user_id;
//                     $premium->update_day = Carbon::now();
//                     $premium->end_day = Carbon::now()->addDays($payment->priceList->duration_day * $payment->quantity);
//                 }
//                 $premium->save();
//             }

//             // Cập nhật thông tin VIP của người dùng
//             $user = User::find($user_id);
//             $user->has_vip_badge = true;
//             $user->vip_expiration_date = $premium->end_day;
//             $user->save();

//             // Tạo bản ghi trong bảng transactions
//             $transaction = new Transaction();
//             $transaction->balance = '0';
//             $transaction->description = 'Thanh toán hóa đơn';
//             $transaction->total_price = $request->vnp_Amount / 100;
//             $transaction->user_id = $user_id;
//             $transaction->save();

//             // Xóa giỏ hàng sau khi thanh toán thành công
//             foreach ($payments as $payment) {
//                 $payment->delete();
//             }

//             return response()->json(['status' => 'success', 'message' => 'Thanh toán thành công']);
//         } else {
//             return response()->json(['status' => 'error', 'message' => 'Thanh toán không thành công']);
//         }
//     }

//     return response()->json(['status' => 'error', 'message' => 'Xác thực không thành công']);
// }

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

    // Kiểm tra xác thực thanh toán
    if ($secureHash == $request->vnp_SecureHash) {
        $paymentIds = explode('-', $request->vnp_TxnRef);
        $carts = Cart::whereIn('id', $paymentIds)
                    ->where('status', 2)
                    ->get();
        $amount = $request->vnp_Amount / 100;
        
        // Kiểm tra nếu thanh toán thành công
        if ($request->vnp_ResponseCode == '00') {
            // Chạy sự kiện ngầm khi thanh toán thành công
            event(new PaymentProcessed($carts, $amount));

            // Xóa giỏ hàng sau khi thanh toán thành công
            foreach ($carts as $cart) {
                $cart->delete();
            }

            return true; // Trả về thành công
        } else {
            // Nếu thanh toán thất bại thì không chạy sự kiện
            return false;
        }
    }

    // Xác thực không thành công
    return false;
}







    // Tạo thanh toán lưu vào DB
    public function createPayment($request, $userId)
    {
        $carts = Cart::where('user_id', $userId)->where('status', 2)->with('priceList')->get();
        // Kiểm tra nếu không có giỏ hàng
        if ($carts->isEmpty()) {
            return null;
        }

        $totalAmount = $carts->sum(function ($cart) {
            return $cart->priceList->price * $cart->quantity;
        });

        // $totalAmount = $request->input('totalAmount');

        // $payment = Bill::create([
        //     // 'resident_id' => $userId, trường này chưa có nên cmt lại
        //     'creator_id' => $userId,
        //     'payer_id' => $userId,
        //     'payment_date' => Carbon::now(),
        //     'amount' => $totalAmount,
        //     'title' => 'Thanh toán thành công',
        //     'description' => 'Thanh toán gói dịch vụ',
        //     'status' => '1'
        // ]);

        // Có thể thêm logic để lưu chi tiết thanh toán nếu cần

        return [
            'carts' => $carts,
            'totalAmount' => $totalAmount
        ];
    }
    // Chi tiết thanh toán
    public function getPaymentDetails()
    {
        $userId = Auth::user()->id; // Sửa từ Auth::user->id() thành Auth::user()->id
        return Transaction::where('user_id', $userId)
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo giảm dần
            ->first();
    }


    public function clearPaidPriceLists($paymentId)
    {
        // Lấy thông tin thanh toán
        $payment = Bill::findOrFail($paymentId);

        // Lấy tất cả các giỏ hàng của người dùng
        $carts = Cart::where('user_id', $payment->payer_id)->get();
        foreach ($carts as $cart) {
            // Lấy các price list trong cart (cart detail
            $cart->delete();
        }

        return true; // Trả về true khi xóa thành công
    }


}
