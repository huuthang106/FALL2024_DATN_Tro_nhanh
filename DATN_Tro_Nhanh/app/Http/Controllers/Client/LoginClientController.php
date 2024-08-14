<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginClientController extends Controller
{
    public function login(){
        return view('client.show.login');
    }
    public function register(){
        return view('client.add.register');
    }
    public function fogot(){
        return view('client.edit.password-recovery');
    }
}
