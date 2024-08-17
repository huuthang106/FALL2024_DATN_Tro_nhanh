<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
 // Import lớp Blog
use App\Models\Image;
use App\Models\Notification;
use App\Services\NotificationService;

class BlogServices
{

    private function createSlug($title, $id)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '', $title), '-'));
        $slug = $slug . $id;

        return $slug;
    }
    public function create(array $data, $images = []): bool
    {
        try {
            // Tạo blog mới
            $blog = new Blog();
            $blog->title = $data['title'];
            $blog->description = $data['description'];
            $blog->user_id = Auth::id();
            $blog->save();

            // Tạo slug cho blog
            $slug = $this->createSlug($data['title'], $blog->id);
            $blog->slug = $slug;
            $blog->save();

            // Xử lý tải ảnh
            if ($images) {
                foreach ($images as $image) {
                    $path = $image->store('assets/images');

                    $imageModel = new Image();
                    $imageModel->filename = basename($path);
                    $imageModel->blog_id = $blog->id;
                    $imageModel->save();
                }
            }
            Notification::send($blog->user_id, 'Blog mới đã được tạo thành công!');

            return true;
        } catch (\Exception $e) {
            Log::error('Không thể tạo blog: ' . $e->getMessage());
            return false;
        }
    }
    


    
    
    

    
    public function getAllBlogs(int $perPage = 1)
    {
        try {
            return Blog::where('status', 1)->paginate($perPage);
        } catch (\Exception $e) {

            return null;
        }
    }
    public function getBlogBySlug(string $slug): ?Blog
    {
        try {
            return Blog::where('slug', $slug)->first();
        } catch (\Exception $e) {
            return null;
        }
    }


}
