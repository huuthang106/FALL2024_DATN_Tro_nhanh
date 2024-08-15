<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('client.show.home');
    }
    // Giao diện Về Chúng Tôi
    public function showAbout()
    {
        return view('client.show.about-us');
    }
    // Giao diện Dịch Vụ
    public function showService()
    {
        return view('client.show.services');
    }
}
