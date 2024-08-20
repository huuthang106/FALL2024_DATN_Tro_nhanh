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

        // Lấy tất cả các mục yêu thích của người dùng hiện tại, kèm theo thông tin của room
        $favourites = Favourite::with('room')
            ->where('user_id', $userId)
            ->get();
        // dd($favourites); // Kiểm tra dữ liệu trả về
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

}

    // public function deleteBySlug($slug)
    // {
    //     try {

    //         $favourite = Favourite::where('slug', $slug)->first();

    //         // Kiểm tra xem có tồn tại không
    //         if (!$favourite) {
    //             return [
    //                 'success' => false,
    //                 'message' => 'Mục yêu thích không tồn tại.'
    //             ];
    //         }

    //         // Xóa mục yêu thích
    //         $favourite->delete();

    //         return [
    //             'success' => true,
    //             'message' => 'Mục yêu thích đã được xóa thành công.'
    //         ];
    //     } catch (\Exception $e) {
    //         // Ghi log lỗi nếu có
    //         Log::error('Lỗi khi xóa mục yêu thích: ' . $e->getMessage());

    //         return [
    //             'success' => false,
    //             'message' => 'Đã xảy ra lỗi khi xóa mục yêu thích.'
    //         ];
    //     }
    // }
