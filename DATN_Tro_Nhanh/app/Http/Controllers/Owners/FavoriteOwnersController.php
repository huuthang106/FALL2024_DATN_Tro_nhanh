<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteOwnersController extends Controller
{
    //
    public function index(){
        return view('owners.show.dashboard-my-favorites');
    }
}
