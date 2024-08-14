<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomOwnersController extends Controller
{
    //
    public function page_add_rooms()
    {
        return view('owners.create.add-new-property');
    }
    public function index()
    {
        return view('owners.show.dashboard-my-properties');
    }
}
