<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\RoomClientServices;
class HomeClientController extends Controller
{
    protected $roomClientService;

    public function __construct(RoomClientServices $roomClientService)
    {
        $this->roomClientService = $roomClientService;
    }
    public function index()
    {
        $user = Auth::user();
        $rooms = $this->roomClientService->getRoomWhere();
        return view('client.show.home', ['rooms' => $rooms]);
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
