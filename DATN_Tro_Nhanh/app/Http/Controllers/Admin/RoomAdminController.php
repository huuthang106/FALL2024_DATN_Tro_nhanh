<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomAdminController extends Controller
{
    //
    public function index(){
        return view('admincp.demo8.dist.index');
    }
}
