<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    public $user;

    public function __construct()
{
    // Debugging line to check user data
    dd(Auth::user());
    $this->user = Auth::user();
}


    public function render()
    {
        return view('components.user-profile');
    }
}
