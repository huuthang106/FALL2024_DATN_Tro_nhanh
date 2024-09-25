<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Models\Room;
use App\Models\User;
use App\Models\PriceList;

class PaymentOwnersController extends Controller
{
    //
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }
    // public function showCurrentUserTransactions()
    // {
    //     $bills = $this->BillService->getCurrentUserBills();
    //     return view('owners.show.dashbroard-my-bill', compact('bills'));
    // }
    public function page_add_invoice()
    {
        return view('owners.create.add-new-invoice');
    }


    

}
