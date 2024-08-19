<?php 
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProfileService
{
    /**
     * Lấy thông tin người dùng dựa trên ID.
     *
     * @param int $id
     * @return User|null
     */
    public function getUserById($slug)
    {
        return User::where('slug', $slug)->firstOrFail();
    }
    

    /**
     * Cập nhật thông tin người dùng.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function updateProfileBySlug($slug, array $data)
{
    $user = User::where('slug', $slug)->firstOrFail();

    // Kiểm tra nếu có tải lên ảnh mới
    if (isset($data['image'])) {
        // Xóa ảnh cũ nếu có
        if ($user->image) {
            $oldImagePath = public_path('assets/images/' . $user->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Lưu ảnh mới
        $image = $data['image'];
        $timestamp = now()->format('YmdHis');
        $originalName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $filename = pathinfo($originalName, PATHINFO_FILENAME) . '-' . $timestamp . '.' . $extension;

        $destinationPath = public_path('assets/images');
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $image->move($destinationPath, $filename);

        $data['image'] = $filename;
    }

    // Cập nhật slug từ tên người dùng, nếu có thay đổi tên
    if (isset($data['name'])) {
        $slug = Str::slug($data['name']) . '-' . $user->id;
        $data['slug'] = $slug;
    }

    $user->update($data);

    return true;
}


    
}

