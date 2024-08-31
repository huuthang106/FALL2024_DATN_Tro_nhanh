<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WatchListOwner;
use Illuminate\Support\Facades\Auth;

class WatchlistClientController extends Controller
{
    //
    protected $watchListOwner;
    public function __construct(WatchListOwner $watchListOwner)
    {
        $this->watchListOwner = $watchListOwner;
    }
    public function follow($person_being_followed_id)
{
    if (Auth::check()) {
        $user_id = Auth::id();
        $response = $this->watchListOwner->follow($person_being_followed_id, $user_id);
        // dd($response);
        // Trả về phản hồi từ phương thức follow
        return response()->json($response);
    } else {
        dd('cc');
        // return response()->json([
        //     'success' => false,
        //     'message' => 'User not authenticated.'
        // ]);
    }
}

}
