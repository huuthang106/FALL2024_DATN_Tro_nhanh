<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\watchListOwner;
use Illuminate\Support\Facades\Auth;

class WatchlistOwnersController extends Controller
{
    //
 protected $watchListOwner;
 private const limit = 10;
    public function __construct(watchListOwner $watchListOwner)
    {
        $this->watchListOwner = $watchListOwner;
    }
    public function index(){
        if(Auth::check()){
            $user_id= Auth::id();
        $myFollowings = $this->watchListOwner->myFollowings($user_id, self::limit);
        return view('owners.show.my-watch-list',compact('myFollowings'));

        }
    }
}
