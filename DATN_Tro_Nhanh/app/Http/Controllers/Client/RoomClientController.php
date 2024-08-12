<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomClientController extends Controller
{
    //Hiển thị giao diện Danh sách phòng trọ
    public function indexRoom()
    {
        return view('client.show.listing-grid-with-left-filter');
    }
    //Hiển thị giao diện Danh sách phòng trọ có Map
    public function indexRoomMap()
    {
        return view('client.show.listing-half-map-list-layout-1');
    }
    public function page_detail()
    {
        return view('client.show.single-propety');
    }
}
