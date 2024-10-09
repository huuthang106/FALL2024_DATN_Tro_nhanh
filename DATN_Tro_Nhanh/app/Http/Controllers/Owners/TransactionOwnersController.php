<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class TransactionOwnersController extends Controller
{
    protected $cassoService;

    public function __construct(PaymentService $cassoService)
    {
        $this->cassoService = $cassoService;
    }

    
    public function index(Request $request)
    {
        
        $data = $request->all();
        $apiResponse = $this->cassoService->getTransactions($data);
      
        // // Lấy danh sách giao dịch của người dùng
        // $transactions = $this->cassoService->getUserTransactions();

        // return view('owners.show.dashbroard-my-bill', compact('transactions'));
    }
    public function getTransactions(Request $request)
    {
        
      
        // // Lấy danh sách giao dịch của người dùng
        $transactions = $this->cassoService->getUserTransactions();

        return view('owners.show.dashbroard-my-bill', compact('transactions'));
    }
    public function getWithdrawMomny()
    {
        $bankInformation = $this->cassoService->getUserBank();
        return view('owners.show.dashboard-my-withdrawmoney', compact('bankInformation'));
    }


}
