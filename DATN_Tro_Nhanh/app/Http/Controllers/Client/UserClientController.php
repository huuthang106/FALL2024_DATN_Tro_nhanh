<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserClientController extends Controller
{
    public function page_dashboard()
    {
        return view('client.show.dashboard');
    }
}
