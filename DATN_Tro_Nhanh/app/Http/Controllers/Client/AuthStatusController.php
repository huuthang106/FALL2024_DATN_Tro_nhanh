<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthStatusController extends Controller
{
    public function check()
    {
        return response()->json(['authenticated' => Auth::check()]);
    }
}