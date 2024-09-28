<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\RoomClientServices;
use App\Services\PremiumService;


class HomeClientController extends Controller
{
    protected $roomClientService;
    protected $premiumService;

    public function __construct(RoomClientServices $roomClientService, PremiumService $premiumService)
    {
        $this->roomClientService = $roomClientService;
        $this->premiumService = $premiumService;
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $rooms = $this->roomClientService->getRoomWhere();
        $roomClient = $this->roomClientService->RoomClient();
        $locations = $this->roomClientService->getUniqueLocations();
        $categories = $this->roomClientService->getCategories();
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'roomClient' => $roomClient,
                'categories' => $categories,
                'rooms' => $rooms,
                'provinces' => $locations['provinces'],
                'districts' => $locations['districts'],
                'villages' => $locations['villages'],
                'province' => request()->input('province', '')
            ]);
        }
        
        $updatedCount = $this->premiumService->updateStatusAndRemoveExpiredPremiumUsers();
        $updatedRoomCount = $this->roomClientService->checkAndUpdateExpiredRooms();
        return view('client.show.home', [
            'roomClient' => $roomClient,
            'categories' => $categories,
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
