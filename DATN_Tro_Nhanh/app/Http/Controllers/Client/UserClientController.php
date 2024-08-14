<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserClientController extends Controller
{
    public function login(){
        return view('client.show.login');
    }
    public function register(){
        return view('client.create.register');
    }
    public function fogot(){
        return view('client.edit.password-recovery');
    // Giao diện Danh Sách Người Đăng Tin
    }
    public function indexAgent()
    {
        return view('client.show.agents-grid-2');
    }
    // Giao diện Chi Tiết NGười Đăng Tin
    public function agentDetail()
    {
        return view('client.show.agent-details-1');
    }
}
