<?php

namespace App\Services;


use App\Models\Watchlist;

use Illuminate\Support\Facades\Storage;
use App\Events\Admin\ZoneUpdated;
use App\Models\Utility;
use App\Events\UserFollowed;
class WatchListOwner
{
private const show = 1;
    public function myFollowings ($id,$limit){
        $myFollowings = WatchList::where('follower', $id)->paginate($limit);
        return $myFollowings;
    }
    public function follow($person_being_followed_id, $follower_id)
    {
        // Tạo bản ghi mới trong bảng watch_list
        $watchList = new WatchList();
        $watchList->user_id = $person_being_followed_id; // Người được theo dõi
        $watchList->follower= $follower_id; // Người theo dõi
        $watchList->status= self::show; 
        $watchList->save(); // Lưu vào cơ sở dữ liệu
        $watchListId = $watchList->id;
     // Phát sự kiện UserFollowed
     event(new UserFollowed($person_being_followed_id,$watchListId, $follower_id));
        // Trả về bản ghi vừa tạo hoặc một thông điệp thành công
        return $watchList;
    }
    public function checkFollowing($userId, $followerId)
    {
        return WatchList::where('user_id', $userId)
                   ->where('follower', $followerId)
                   ->exists();
    }
    
}