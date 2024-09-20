<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
class TransactionOwnersController extends Controller
{
    protected $cassoService;

    public function __construct(PaymentService $cassoService)
    {
        $this->cassoService = $cassoService;
    }

    
    public function index()
    {
        // Gọi service để lấy giao dịch từ Casso
        $apiResponse = $this->cassoService->getTransactions();

        // Lấy danh sách giao dịch của người dùng
        $transactions = $this->cassoService->getUserTransactions();

        return view('owners.show.dashbroard-my-bill', compact('transactions'));
    }
}
