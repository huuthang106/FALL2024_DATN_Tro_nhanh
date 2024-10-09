<?php 
 namespace App\Services;

 use GuzzleHttp\Client;
 use Illuminate\Support\Str;
 use Illuminate\Support\Facades\Auth;
 use App\Models\Transaction;
 use GuzzleHttp\Exception\RequestException;
 use Illuminate\Support\Facades\Http;
 use App\Models\User;
 use Illuminate\Support\Facades\Log;
    
 class CassoService
 {
     protected $client;

     public function generateQrCodeUrl()
    {
        $userId = Auth::user()->id; // Fixed method call to use parentheses
        // Thiết lập các thông tin cố định
        $bankId = 'vietinbank';
        $accountNo = '101882785438';
        $template = 'YMhjhkj';
        $amount = ""; // Số tiền
        $logoUrl = asset('assets/images/tro-moi.png'); 
        $description = 'TN GD ' . $userId; // Lời nhắn
        $accountName = 'TONG CHI NHAN'; // Tên tài khoản

        // $url = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo=" . urlencode($description) . "&accountName=" . urlencode($accountName);
        $url = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-{$template}.png?amount={$amount}&addInfo=" . urlencode($description) . "&accountName=" . urlencode($accountName) . "&logo=" . urlencode($logoUrl);
        return $url;
    }
    
 
     public function getTransactions($apiKey)
     {
         $client = new Client([
             'base_uri' => 'https://oauth.casso.vn/v2/',
             'timeout'  => 30,
             'verify' => false
              // Tắt xác minh SSL
         ]);
     
         try {
             $response = $client->request('GET', 'transactions', [
                 'headers' => [
                     'Authorization' => 'Apikey ' . $apiKey,
                     'Content-Type' => 'application/json'
                 ],
                 'query' => [
                     'fromDate' => date('Y-m-d', strtotime('-30 days')),
                     'page' => 1,
                     'pageSize' => 100,
                 ]
             ]);
     
             $data = json_decode($response->getBody(), true);
             \Log::info('Casso API response: ' . json_encode($data));
             
             $transactions = $data['data']['records'] ?? [];
             $processedTransactions = $this->processAndSaveTransactions($transactions);
             
             return [
                 'raw_transactions' => $transactions,
                 'processed_transactions' => $processedTransactions
             ];
         } catch (RequestException $e) {
             \Log::error("Casso API error: " . $e->getMessage());
             return [
                 'raw_transactions' => [],
                 'processed_transactions' => []
             ];
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
                             $newTransaction->total_price = $amount;
                             $newTransaction->balance = $user->balance;
                             $newTransaction->save();
     
                             $processedTransactions[] = $newTransaction;
     
                             \Log::info("Giao dịch đã được xử lý và lưu: " . json_encode($newTransaction));
                         } else {
                             \Log::info("Giao dịch đã tồn tại: " . $transactionId);
                         }
                     } else {
                         \Log::warning("Không tìm thấy ID giao dịch trong dữ liệu API");
                     }
                 } else {
                     \Log::warning("Không tìm thấy người dùng với ID: $userId");
                 }
             } else {
                 \Log::warning("Không tìm thấy ID người dùng trong mô tả giao dịch: $description");
             }
         }
     
         return $processedTransactions;
     }

    //  public function getUserTransactions(int $perPage = 10, $searchTerm = null)
    //  {
    //      try {
    //          // Lấy user hiện tại
    //          $userId = Auth::id();
 
    //          // Xây dựng truy vấn để lấy các Bill của user cụ thể
    //          $query = Transaction::where('user_id', $userId);
 
    //          // Nếu có từ khóa tìm kiếm, lọc theo từ khóa trong các trường liên quan
    //          if ($searchTerm) {
    //              $query->where(function ($q) use ($searchTerm) {
    //                  $q->where('invoice_number', 'like', '%' . $searchTerm . '%')
    //                      ->orWhere('description', 'like', '%' . $searchTerm . '%')
    //                      ->orWhere('amount', 'like', '%' . $searchTerm . '%');
    //              });
    //          }
     
    //          // Phân trang và trả về kết quả
    //          return $query->paginate($perPage);
    //      } catch (\Exception $e) {
    //          // Xử lý ngoại lệ và trả về null nếu có lỗi xảy ra
    //          return null;
    //      }
    //  }
 }