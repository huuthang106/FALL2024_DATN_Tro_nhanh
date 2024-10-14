<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;

class TransactionAdminController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function getDataWithdrawal()
    {
        $withdrawal = $this->paymentService->getDataWithdrawal();
        return view('admincp.show.show-withdrawal', compact('withdrawal'));
    }
}
