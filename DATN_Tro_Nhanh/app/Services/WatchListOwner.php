<?php

namespace App\Services;


use App\Models\Watchlist;

use Illuminate\Support\Facades\Storage;
use App\Events\Admin\ZoneUpdated;
use App\Models\Utility;
class WatchListOwner
{

    public function myFollowings ($id,$limit){
        $myFollowings = WatchList::where('follower', $id)->paginate($limit);
        return $myFollowings;
    }
}