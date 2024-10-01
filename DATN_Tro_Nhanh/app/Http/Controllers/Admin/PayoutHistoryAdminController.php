<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayoutHistoryAdminController extends Controller
{
    //
    public function index(){
        return view('admincp.show.show-Payout-History');
    }
}
