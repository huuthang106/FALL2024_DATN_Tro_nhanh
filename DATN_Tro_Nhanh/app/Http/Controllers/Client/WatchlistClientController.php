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
            $follow = $this->watchListOwner->follow($person_being_followed_id, $user_id);
            return response()->json(['success' => true]);
            // Kiểm tra kết quả của hành động follow
            if ($follow) {
                return redirect()->back()->with('success', 'Đã theo dõi thành công');
            } else {
                return response()->json(['success' => false, 'message' => 'Follow action failed.']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'User not authenticated.']);
        }
    }
    
    
}
