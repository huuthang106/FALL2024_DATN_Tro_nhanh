<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BillService;

class PaymentOwnersController extends Controller
{
    //
    protected $BillService;

    public function __construct(BillService $BillService)
    {
        $this->BillService = $BillService;
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
