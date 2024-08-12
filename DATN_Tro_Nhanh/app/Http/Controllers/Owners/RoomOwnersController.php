<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomOwnersController extends Controller
{
    //Hiển thị giao diện Danh sách phòng trọ
    public function indexRoom()
    {
        return view('owners.rooms.users.listing-grid-with-left-filter');
    }
    //Hiển thị giao diện Danh sách phòng trọ có Map
    public function indexRoomMap()
    {
        return view('owners.rooms.users.listing-half-map-grid-layout-1');
    }
}
