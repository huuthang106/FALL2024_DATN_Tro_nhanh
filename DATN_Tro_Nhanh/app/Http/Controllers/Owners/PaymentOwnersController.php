<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentOwnersController extends Controller
{
    //
    public function page_add_invoice()
    {
        return view('owners.create.add-new-invoice');
    }
}
