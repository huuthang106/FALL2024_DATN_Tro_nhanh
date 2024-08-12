<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexOwnersController extends Controller
{
    //
    public function indexInvoice()
    {
        return view('owners.show.dashboard-invoice-listing');
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
