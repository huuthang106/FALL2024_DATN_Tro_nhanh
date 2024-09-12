<?php

namespace App\Services;


use App\Models\Watchlist;

use Illuminate\Support\Facades\Storage;
use App\Events\Admin\ZoneUpdated;
use App\Models\Utility;
use Illuminate\Support\Facades\Log;
use App\Events\UserFollowed;

class WatchListOwner
{
    private const show = 1;
    public function myFollowings($id, $limit)
    {
        $myFollowings = WatchList::where('follower', $id)->paginate($limit);
        return $myFollowings;
    }

    public function myFollowers($id, $limit) // {{ edit_1 }}
    {
        $myFollowers = WatchList::where('user_id', $id) // {{ edit_2 }} 
            ->paginate($limit);
        return $myFollowers;
    }
    public function follow($person_being_followed_id, $follower_id)
    {
        // Tìm kiếm bản ghi trong bảng watch_list
        $watchList = WatchList::where('user_id', $person_being_followed_id)
            ->where('follower', $follower_id)
            ->first();

        if ($watchList) {
            // Nếu đã theo dõi, hủy theo dõi
            $watchList->delete();
            $status = 'Theo dõi';
        } else {
            // Nếu chưa theo dõi, thêm vào danh sách theo dõi
            $watchList = new WatchList();
            $watchList->user_id = $person_being_followed_id; // Người được theo dõi
            $watchList->follower = $follower_id; // Người theo dõi
            $watchList->status = self::show;
            $watchList->save(); // Lưu vào cơ sở dữ liệu
            $watchListId = $watchList->id;

            // Phát sự kiện UserFollowed
            event(new UserFollowed($person_being_followed_id, $watchListId, $follower_id));
            $status = 'Đã theo dõi';
        }

        // Trả về thông điệp thành công hoặc hủy theo dõi
        return response()->json(['success' => true, 'status' => $status]);
    }




    public function checkFollowing($userId, $followerId)
    {
        return WatchList::where('user_id', $userId)
            ->where('follower', $followerId)
            ->exists();
    }
    public function getTotalWatchListsByUser($userId)
    {
        try {
            // Đếm tổng số watchlists của người dùng với ID cụ thể
            return WatchList::where('user_id', $userId)->count();
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có sự cố khi đếm số watchlists
            Log::error('Error counting watchlists: ' . $e->getMessage());
            return 0;
        }
    }
}
