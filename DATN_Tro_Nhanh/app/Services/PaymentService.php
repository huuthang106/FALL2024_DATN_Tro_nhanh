<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\Premium;
use App\Models\User;
use App\Models\Room;
use App\Models\PriceList;
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

    public function __construct()
    {
        // $this->vnpUrl = Config::get('payment.vnp_url'); // URL của VNPay
        // $this->vnpHashSecret = Config::get('payment.vnp_hash_secret'); // Secret key của VNPay
        $this->client = new Client([
            'base_uri' => $this->cassoBaseUri,
            'timeout'  => 30,
            'verify' => false // Tắt xác minh SSL
        ]);

        // Lấy API key từ file .env
        $this->apiKey = env('CASSO_API_KEY');
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
    public function getTransactions()
    {
        try {
            $response = $this->client->request('GET', 'transactions', [
                'headers' => [
                    'Authorization' => 'Apikey ' . $this->apiKey,
                    'Content-Type' => 'application/json'
                ],
                'query' => [
                    'fromDate' => date('Y-m-d', strtotime('-30 days')),
                    'page' => 1,
                    'pageSize' => 100,
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            Log::info('Casso API response: ' . json_encode($data));
            
            $transactions = $data['data']['records'] ?? [];
            return $this->processAndSaveTransactions($transactions);

        } catch (\Exception $e) {
            Log::error("Casso API error: " . $e->getMessage());
            return [];
        }
    }

    
    private function processAndSaveTransactions($transactions)
    {
        $processedTransactions = [];

        foreach ($transactions as $transaction) {
            $description = $transaction['description'] ?? '';
            preg_match('/GD(\d+)/', $description, $matches);
            
            if (isset($matches[1])) {
                $userId = intval($matches[1]);
                $user = User::find($userId);
                
                if ($user) {
                    $amount = $transaction['amount'] ?? 0;
                    $transactionId = $transaction['id'] ?? null;
                    
                    if ($transactionId) {
                        $existingTransaction = Transaction::find($transactionId);
                        
                        if (!$existingTransaction) {
                            $user->balance += $amount;
                            $user->save();

                            $newTransaction = new Transaction();
                            $newTransaction->id = $transactionId;
                            $newTransaction->user_id = $userId;
                            $newTransaction->description = $description;
                            $newTransaction->added_funds = $amount;
                            $newTransaction->balance = $user->balance;
                            $newTransaction->save();

                            $processedTransactions[] = $newTransaction;

                            Log::info("Giao dịch đã được xử lý và lưu: " . json_encode($newTransaction));
                        } else {
                            Log::info("Giao dịch đã tồn tại: " . $transactionId);
                        }
                    }
                }
            }
        }

        return $processedTransactions;
    }

    public function getUserTransactions()
    {
        $user = Auth::user();
        return Transaction::where('user_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->orderBy('id', 'desc')
                            ->paginate(10);
    }

    public function handlePayment($user, $room, $priceListId)
    {
        // Lấy thông tin của gói VIP từ PriceList
        $priceList = PriceList::findOrFail($priceListId);
        $price = $priceList->price;
        $duration = $priceList->duration_day; // Số ngày của gói VIP

        // Trừ tiền từ số dư tài khoản của người dùng
        $user->balance -= $price;
        $user->save();

        // Cộng thêm thời gian VIP cho phòng
        $currentExpiration = $room->expiration_date ? Carbon::parse($room->expiration_date) : now();
        $newExpiration = $currentExpiration->addDays($duration);

        // Cập nhật ngày hết hạn và lưu price_list_id cho phòng
        $room->expiration_date = $newExpiration;
        $room->location_id = $priceList->location->id;
        $room->save();

        // Lưu lịch sử thanh toán
        $transaction = new Transaction();
        $transaction->balance = $user->balance - $price; // Lưu lại số dư sau khi thanh toán
        $transaction->description = 'Thanh toán gói tin';
        $transaction->added_funds = - $price; // Thêm dấu trừ vào trước giá trị
        $transaction->total_price = $price;
        $transaction->user_id = $user->id;
        $transaction->save();

        // Trả về trạng thái thanh toán thành công
        return [
            'status' => true,
            'message' => 'Thanh toán thành công.'
        ];
    }
}
