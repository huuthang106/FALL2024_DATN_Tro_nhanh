<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FavouritesServices;
use App\Services\BlogServices;
use Illuminate\Support\Facades\Log;
use App\Models\Blog; // Import lớp Blog
use App\Models\Image; // Import lớp Image
use App\Events\BlogCreated;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateBlogRequest;
use App\Services\NotificationService;

class FavouriteOwnersController  extends Controller
{
    protected $favouritesService;

    // Constructor để khởi tạo service
    public function __construct(FavouritesServices $favouritesService)
    {
        $this->favouritesService = $favouritesService;
    }

    // Phương thức index để hiển thị danh sách các favourites
    public function index()
    
    {
        

        return view('owners.show.dashboard-my-favorites');
    }
   // FavouriteController.php
   public function remove(Request $request, $id)
   {
       // Kiểm tra nếu người dùng chưa đăng nhập
       if (!$request->user()) {
           return redirect()->back()->with('error', 'User not authenticated');
       }
   
       $userId = $request->user()->id;
   
       // Xóa mục khỏi bảng favourites dựa trên ID
       $result = $this->favouritesService->removeFavouriteById($id, $userId);
   
       if ($result) {
           return redirect()->back()->with('success', 'Removed from favourites');
       } else {
           return redirect()->back()->with('error', 'Failed to remove from favourites');
       }
   }
   
   

    // public function destroyBySlug($slug)
    // {
    //     $result = $this->favouritesService->deleteBySlug($slug);

    //     // Xử lý thông báo thành công hoặc lỗi
    //     if ($result['success']) {
    //         return redirect()->back()->with('success', $result['message']);
    //     } else {
    //         return redirect()->back()->with('error', $result['message']);
    //     }
    // }

  
}
