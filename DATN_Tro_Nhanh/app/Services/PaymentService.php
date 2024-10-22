<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Premium;
use App\Models\User;
use App\Models\Room;
use App\Models\PriceList;
use App\Models\PayoutHistory;
use App\Models\Notification;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Events\PaymentProcessed;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PaymentService
{

    protected $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    protected $vnp_TmnCode = "YZYXA9YP"; // Thay YOUR_TMNCODE bằng mã thực
    protected $vnp_HashSecret = "8NPEYEFICFTH31ZVMER5J4BVW09V8S0W"; // Thay YOUR_HASH_SECRET bằng khóa bí mật thực
    private $cassoBaseUri = 'https://oauth.casso.vn/v2/';
    protected $vnpUrl;
    protected $vnpHashSecret;
    private $apiKey;
    private $Giohang = 2;
    private $Donchuaduyet = 1;
    private $Naptien = 1;

    public function __construct()
    {
        // $this->vnpUrl = Config::get('payment.vnp_url'); // URL của VNPay
        // $this->vnpHashSecret = Config::get('payment.vnp_hash_secret'); // Secret key của VNPay
        $this->client = new Client([
            'base_uri' => $this->cassoBaseUri,
            'timeout' => 30,
            'verify' => false // Tắt xác minh SSL
        ]);

        // Lấy API key từ file .env
        $this->apiKey = env('CASSO_API_KEY');
    }



    public function createPayout($data)
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail($data['user_id']);

            // Kiểm tra số dư
            if ($user->balance < $data['amount']) {
                throw new \Exception('Số dư không đủ để thực hiện giao dịch.');
            }

            if ($data['amount'] <= 10000) {
                return [
                    'success' => false,
                    'message' => 'Số tiền rút phải lớn hơn 10,000 VND.'
                ];
            }

            // Cập nhật thông tin ngân hàng của user
            if (isset($data['bank_code'])) {
                $user->bank_name = $data['bank_code']; // Sử dụng bank_code thay vì bank_name
            }
            if (isset($data['account_number'])) {
                $user->bank_account = $data['account_number'];
            }
            if (isset($data['card_holder_name'])) {
                $user->card_holder_name = $data['card_holder_name'];
            }
            $user->save();

            // Tạo yêu cầu rút tiền mới
            $payout = new PayoutHistory();
            $payout->fill($data);
            $payout->bank_name = $data['bank_code'];
            $payout->status = '1'; // Đang xử lý
            $payout->requested_at = now();

            // Xử lý nội dung rút tiền
            if (isset($data['description'])) {
                $payout->description = $data['description'];
            } elseif (isset($data['content'])) {
                $payout->description = $data['content'];
            }
            $payout->save();

            $notification = new Notification(); // Tạo đối tượng Notification
            $notification->user_id = $user->id; // Lấy user_id từ payout
            $notification->data = 'Đơn rút tiền có mã đơn là ' . $payout->single_code . ' đã được tạo';
            $notification->type = 'Rút tiền';
            $notification->save();

            $transaction = new Transaction();
            $transaction->type = 'Rút tiền';
            $transaction->user_id = $data['user_id'];
            $transaction->added_funds = $data['amount'];
            $transaction->balance = $user->balance - $data['amount']; // Cập nhật số dư mới
            $transaction->status = '2'; // Đang xử lý
            $transaction->description = 'Rút tiền về tài khoản với mã đơn là ' . $payout->single_code;
            $transaction->save();

            // Cập nhật số dư của user
            $user->balance -= $data['amount'];
            $user->save();

            DB::commit();

            return [
                'success' => true,
                'message' => 'Yêu cầu rút tiền đã được ghi nhận và số dư đã được cập nhật.',
                'payout' => $payout,
                'transaction' => $transaction
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi chi tiết khi tạo yêu cầu rút tiền: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Có lỗi xảy ra: ' . $e->getMessage()
            ];
        }
    }

    public function getUserBank()
    {
        $userId = Auth::user()->id;
        $bankInformation = PayoutHistory::where('user_id', $userId)->get();
        return $bankInformation;
    }

    public function transferStatusPayout($id)
    {
        $payout = PayoutHistory::findOrFail($id);
        $payout->status = '2';
        $payout->save();

        $notification = new Notification();
        $notification->user_id = $payout->user_id;
        $notification->data = 'Đơn rút tiền có mã đơn là ' . $payout->single_code . ' đã được duyệt và tiền đã được chuyển.';
        $notification->type = 'Rút tiền';
        $notification->save();  
        return $payout;
    }

    public function getUserPayouts($userId)
    {
        return PayoutHistory::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getPayouts()
    {
        return PayoutHistory::where('status', $this->Donchuaduyet)
            ->orderBy('created_at', 'desc') // Sắp xếp từ mới nhất tới cũ nhất
            ->paginate(10);
    }

    public function rejectPayout(Request $request, $payoutID)
    {
        $request->validate([
            'rejectionReason' => 'required|string|max:255',
        ]);

        try {
            // Lấy thông tin payout
            $payout = PayoutHistory::findOrFail($payoutID);

            // Cập nhật trạng thái
            $payout->status = 4; // Trạng thái từ chối
            $payout->save();

            // Cập nhật số dư cho người dùng
            $user = User::findOrFail($payout->user_id);
            $user->balance += $payout->amount; // Cộng số tiền vào balance
            $user->save();

            // Tạo thông báo cho người dùng
            $notification = new Notification(); // Tạo đối tượng Notification
            $notification->user_id = $user->id; // Lấy user_id từ payout
            $notification->data = 'Đơn rút tiền có mã đơn là ' . $payout->single_code . ' đã bị từ chối. Lý do: ' . $request->rejectionReason;
            $notification->type = 'Từ chối rút tiền';
            $notification->save();

            $addPay = $payout->amount;
            // Lưu vào bảng transactions
            $transaction = new Transaction(); // Tạo đối tượng Transaction
            $transaction->type = 'Từ chối rút tiền';
            $transaction->user_id = $user->id; // Lấy user_id
            $transaction->added_funds = '+' . $addPay; // Chuyển $addPay thành chuỗi với dấu +
            $transaction->balance = $user->balance; // Lấy balance sau khi cập nhật
            $transaction->description = 'Từ chối đơn rút tiền có mã đơn là ' . $payout->single_code; // Mô tả giao dịch
            $transaction->save(); // Lưu giao dịch

            return true; // Trả về true nếu thành công
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return false; // Trả về false nếu có lỗi
        }
    }

    public function statusPayouts($payoutID)
    {
        try {
            $payoutMoved = PayoutHistory::findOrFail($payoutID); // Lấy đối tượng PayoutHistory
            $payoutMoved->status = self::Dachuyentien; // Cập nhật status
            $payoutMoved->save(); // Lưu thay đổi

            // Tạo notification cho user
            $userId = $payoutMoved->user_id; // Lấy user_id từ payout
            $notification = new Notification(); // Tạo đối tượng Notification
            $notification->user_id = $userId;
            $notification->data = 'Đơn rút tiền của bạn đã được duyệt và tiền đã được chuyển.';
            $notification->type = 'Rút tiền';
            $notification->save(); // Lưu thông báo
            return true; // Trả về true nếu thành công
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return false; // Trả về false nếu có lỗi
        }
    }


    public function processCheckout()
    {
        // Lấy thông tin người dùng
        $user = Auth::user();

        // Lấy các cart từ cơ sở dữ liệu theo cartIds
        $carts = Cart::where('user_id', $user->id)->where('status', 2)->with('priceList')->get();

        if ($carts->isEmpty()) {
            return [
                'success' => false,
                'message' => 'Không có giỏ hàng nào để thanh toán.',
            ];
        }

        $amount = $carts->sum(function ($cart) {
            return $cart->priceList->price * $cart->quantity;
        });

        // Kiểm tra số dư của người dùng
        if ($user->balance < $amount) {
            Log::warning('Số dư tài khoản không đủ.', ['user_id' => $user->id]);
            return [
                'success' => false,
                'message' => 'Số dư tài khoản không đủ để thanh toán.',
            ];
        }

        // Dispatch event sau khi xác nhận thanh toán thành công
        event(new PaymentProcessed($carts, $amount));

        // Trừ số dư của người dùng
        $user->balance -= $amount;
        $user->save();

        Log::info('Số dư đã được trừ sau khi thanh toán.', ['balance' => $user->balance]);

        return [
            'success' => true,
            'message' => 'Thanh toán thành công.',
        ];
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

        return [
            'carts' => $carts,
            'totalAmount' => $totalAmount
        ];
    }
    // Chi tiết thanh toán
    public function getPaymentDetails()
    {
        $userId = Auth::user()->id; // Lấy ID người dùng hiện tại
        return Transaction::where('user_id', $userId)
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo giao dịch
            ->first(); // Lấy giao dịch đầu tiên (mới nhất)
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



    //pay

    //
    public function getTransactions($request)
    {
        try {


            $transactions = $request;
            Log::error("Casso API error: " . json_encode($transactions));

            return $this->processAndSaveTransactions($transactions);
        } catch (\Exception $e) {
            Log::error("Casso API error: " . $e->getMessage());
            return [];
        }
    }


    private function processAndSaveTransactions($transactions)
    {
        // return $transactions;
        if (empty($transactions)) {
            Log::info('Không có dữ liệu giao dịch để xử lý.');
            return 'Không có dữ liệu giao dịch để xử lý.'; // Trả về một mảng rỗng nếu không có dữ liệu
        }

        $description = $transactions['mo_ta'];
        preg_match('/GD\s+(\d+)/', $description, $matches);
        // Log::info('Băm mô tả'.$matches);
        // return $matches;
        if (isset($matches[1])) {
            $userId = intval($matches[1]);
            $user = User::find($userId);


            if ($user) {
                $amount = $transactions['gia_tri'] ?? 0;
                $transactionId = $transactions['ma_gd'] ?? null;

                if ($transactionId) {
                    $existingTransaction = Transaction::find($transactionId);

                    if (!$existingTransaction) {
                        $user->balance += $amount;
                        $user->save();

                        $newTransaction = new Transaction();
                        $newTransaction->id = $transactionId;
                        $newTransaction->user_id = $userId;
                        $newTransaction->description = $description;
                        $newTransaction->added_funds = '+' . $amount;
                        $newTransaction->balance = $user->balance;
                        
                        $newTransaction->save();

                        $processedTransactions[] = $newTransaction;

                        Log::info("Giao dịch đã được xử lý và lưu: " . json_encode($newTransaction));
                        return 'Giao dịch thành công';
                    } else {
                        Log::info("Giao dịch đã tồn tại: " . $transactionId);
                    }
                    return 'Có dữ liệu mã giao dịch nhưng giao dịch thất bại';
                }
                return 'Có dữ liệu nhưng giao dịch thất bại ';
            }
        }
        return 'Giao thất bại';
    }

    public function getUserTransactions()
    {
        $user = Auth::user();
        return Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function getDataWithdrawal()
    {
        $withdrawal = Transaction::where('status', $this->Naptien)->get();
        return $withdrawal;
    }
}
