<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomAdminController extends Controller
{
    //
    public function index(){
        return view('admincp.show.index');
    }
    public function add_room(){
        return view('admincp.create.addRoom');
    }
    public function update_room(){
        return view('admincp.edit.updateRoom');
    }
}
