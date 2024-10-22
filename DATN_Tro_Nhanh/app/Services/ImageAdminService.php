<?php

namespace App\Services;

use App\Models\Favourite;
use App\Models\Image;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
class ImageAdminService
{
 // Đảm bảo bạn đã import model User

 public function getImageUserId($id)
 {
     // Kiểm tra xem người dùng có đăng nhập không
     if (auth()->check()) {
         // Tìm người dùng theo ID
         $user = User::find($id);
 
         // Trả về hình ảnh của người dùng nếu tồn tại
         return $user ? $user->profile_image : null;
     }
 
     // Trả về null nếu người dùng chưa đăng nhập
     return null;
 }

  public function deleteImage($images): bool
  {
    $success = true; // Biến để theo dõi trạng thái xóa

    foreach ($images as $image) {
      $imagePath = public_path('assets/images/register_owner/' . $image);
      if (file_exists($imagePath)) {
        if (!unlink($imagePath)) {
          $success = false; // Nếu không xóa được, đánh dấu là không thành công
        }
      }
    }

    return $success; // Trả về true nếu tất cả các file đã được xóa thành công, ngược lại false
  }
  public function saveImage($image)
  {
    if (isset($image['image'])) {
      $data = $image['image']; // Giả sử đây là đường dẫn tạm thời của hình ảnh
      // Đổi tên file
      $newFileName = time() . '_' . $data->getClientOriginalName(); // Tạo tên file mới
      $path = 'assets/images';

      // Di chuyển ảnh vào thư mục đích
      $data->move(public_path($path), $newFileName); // Lưu hình ảnh vào thư mục 'public/assets/images'
      return $newFileName;
      // Lưu tên file mới vào cơ sở dữ liệu
    } // Trả về true nếu tất cả các file đã được xóa thành công, ngược lại false
  }
  public function saveImages($request, $title, $id)
  {
      if ($request->hasFile('image')) {
          $data = $request->file('image'); // Lấy file từ request
          $slugify = new \Cocur\Slugify\Slugify();
          $slug = $slugify->slugify($title) . '-' . $id; // Tạo slug từ title và id
          $extension = $data->getClientOriginalExtension(); // Lấy phần mở rộng của file
          $newFileName = $slug . '.' . $extension; // Tạo tên file mới
          $path = 'assets/images';

          // Di chuyển ảnh vào thư mục đích
          $data->move(public_path($path), $newFileName); // Lưu hình ảnh vào thư mục 'public/assets/images'
          return $newFileName;
      }
      return null; // Trả về null nếu không có ảnh
  }
}
