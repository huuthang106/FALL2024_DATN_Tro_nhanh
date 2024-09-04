<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BillService;

class IndexOwnersController extends Controller
{
    //
    protected $BillService;

    public function __construct(BillService $BillService)
    {
        $this->BillService = $BillService;
    }
    public function indexInvoice()
    {
        $bills = $this->BillService->getCurrentUserBills();

        // Truyền dữ liệu bills sang view
        return view('owners.show.dashboard-invoice-listing', compact('bills'));
    }

    public function editInvoice()
    {
        return view('owners.edit.dashboard-edit-invoice');
    }
    public function createInvoice()
    {
        return view('owners.create.dashboard-add-new-invoice');
    }
    public function previewInvoice()
    {
        return view('owners.show.dashboard-preview-invoice');
    }
}
