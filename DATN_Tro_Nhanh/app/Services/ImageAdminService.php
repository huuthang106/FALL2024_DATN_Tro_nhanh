<?php

namespace App\Services;

use App\Models\Favourite;
use App\Models\Image;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ImageAdminService
{
  public function getImageUserId($id)
  {
    if (auth::check()) {
      $list_image = Image::where('identity_id', $id)->get();
      return $list_image;
    }
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
}
