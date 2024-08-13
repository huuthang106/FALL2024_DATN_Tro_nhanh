<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationOwnersController extends Controller
{
    public function index()
    {
        return view('client.show.notification');
    }
}
