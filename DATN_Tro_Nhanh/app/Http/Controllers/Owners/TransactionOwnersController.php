<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionOwnersController extends Controller
{
    protected $cassoService;

    public function __construct(PaymentService $cassoService)
    {
        $this->cassoService = $cassoService;
    }

    public function index()
    {

    $apiKey = 'AK_CS.8b3d93f0756511ef9eef9daee9cc4b4e.j8CYnxds56iLFjj7SWWEohb9ydVlM3PGXfjzSkzZq9vhiBzMXKzwjKl0pUoWKZNJYgKytUFr';
    $apiResponse = $this->cassoService->getTransactions($apiKey);

    $extractedUserIds = [];
    foreach ($apiResponse['raw_transactions'] as $transaction) {
        $description = $transaction['description'] ?? '';
        preg_match('/GD(\d+)/', $description, $matches);
        
        $extractedUserIds[] = [
            'description' => $description,
            'extracted_user_id' => isset($matches[1]) ? intval($matches[1]) : null
        ];
    }

    $user = Auth::user();
    $transactions = Transaction::where('user_id', $user->id)
                               ->orderBy('created_at', 'desc') // Sắp xếp từ nhỏ đến lớn
                               ->orderBy('id', 'desc') // Sắp xếp theo id nếu có trùng lặp theo created_at
                               ->paginate(10); // Phân trang với 10 bản ghi
    
    
    return view('owners.show.dashbroard-my-bill', compact('transactions'));
    }
}
