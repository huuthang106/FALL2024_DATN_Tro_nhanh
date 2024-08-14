<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index()
    {
        return view('admincp.show.overview');
    }

    public function setting_profile()
    {
        return view('admincp.show.settings');
    }
}