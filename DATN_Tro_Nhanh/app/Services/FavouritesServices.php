<?php

namespace App\Services;

use App\Models\Favourite;
use App\Models\Image;
use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FavouritesServices
{
    public function getAllFavorites()
{
    $userId = Auth::id(); // Lấy ID người dùng hiện tại

    // Lấy tất cả các mục yêu thích của người dùng hiện tại, kèm theo thông tin của room, với phân trang
    $favourites = Favourite::with('room')
        ->where('user_id', $userId)
        ->paginate(10); // 10 là số mục trên mỗi trang

    return $favourites;
}

   // FavouriteServices.php
   public function removeFavouriteById($id, $userId)
   {
       // Tìm và xóa mục dựa trên ID và user_id
       $favourite = Favourite::where('id', $id)->where('user_id', $userId)->first();
   
       if ($favourite) {
           $favourite->delete();
           return true;
       }
   
       return false;
   }
   public function countUserFavourites($userId)
   {
       return Favourite::where('user_id', $userId)->count();
   }
   

}

   
