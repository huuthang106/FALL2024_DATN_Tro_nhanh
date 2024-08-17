<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Services\RoomClientServices;

class RoomClientController extends Controller
{
    protected $roomClientService;

    public function __construct(RoomClientServices $roomClientService)
    {
        $this->roomClientService = $roomClientService;
    }

    //Hiển thị giao diện Danh sách phòng trọ
    public function indexRoom($perPage = 10)
    {
        $rooms = $this->roomClientService->getAllRoom((int) $perPage);
        return view('client.show.listing-grid-with-left-filter', ['rooms' => $rooms]);
    }
    //Hiển thị giao diện Danh sách phòng trọ có Map
    public function indexRoomMap()
    {
        return view('client.show.listing-half-map-list-layout-1');
    }
    public function page_detail($slug)
    {
        $rooms = $this->roomClientService->getSlugRoom($slug);
        return view('client.show.single-propety', ['rooms' => $rooms]);
    }


}
