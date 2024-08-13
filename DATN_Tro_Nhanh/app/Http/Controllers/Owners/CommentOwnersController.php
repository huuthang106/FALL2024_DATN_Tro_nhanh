<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentOwnersController extends Controller
{
    //
    public function index(){
        return view('dashboard-reviews');
    }
}
