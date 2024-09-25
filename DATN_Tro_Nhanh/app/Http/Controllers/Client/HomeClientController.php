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
        $roomClient = $this->roomClientService->RoomClient();
        $locations = $this->roomClientService->getUniqueLocations();
        if (request()->ajax()) {
            return response()->json([
                'roomClient' => $roomClient,
                'rooms' => $rooms,
                'provinces' => $locations['provinces'],
                'districts' => $locations['districts'],
                'villages' => $locations['villages'],
                'province' => request()->input('province', '') // Truyền biến province từ request hoặc giá trị mặc định
            ]);
        }
        return view('client.show.home', [
            'roomClient' => $roomClient,
            'rooms' => $rooms,
            'provinces' => $locations['provinces'],
            'districts' => $locations['districts'],
            'villages' => $locations['villages'],
            'province' => request()->input('province', '') // Truyền biến province từ request hoặc giá trị mặc định
        ]);
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
