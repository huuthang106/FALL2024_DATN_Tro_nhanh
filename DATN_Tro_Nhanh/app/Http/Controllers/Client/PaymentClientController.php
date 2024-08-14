<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentClientController extends Controller
{
    //
    public function index(){
        return view('client.show.payment');
    }
    public function show(){
        return view('client.show.payment-successful');
    }
}
