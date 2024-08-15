<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogOwnersController extends Controller
{
    //
    public function index(){
        return view('owners.create.add-new-blog');
    }
}
