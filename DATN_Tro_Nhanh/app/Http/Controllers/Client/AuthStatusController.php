<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthStatusController extends Controller
{
    public function check()
    {
        return response()->json(['authenticated' => Auth::check()]);
    }
}