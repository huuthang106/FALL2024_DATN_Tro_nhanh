<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\BlogCreated;

class BlogServices
{
    private function createSlug($title, $id)
    {
        // Create a slug from the title
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $title), '-'));

        // Append the ID
        $slug = $slug . '-' . $id;

        return $slug;
    }

    public function handleBlogCreation($request)
    {
        try {
            $data = $request->validated();
            $images = $request->file('images');

            $blog = new Blog();
            $blog->title = $data['title'];
            $blog->description = $data['description'];
            $blog->user_id = Auth::id();
            $blog->save();
            $slug = $this->createSlug($data['title'], $blog->id);
            $blog->slug = $slug;
            $blog->save();
            if ($images) {
                foreach ($images as $image) {
                    $path = $image->store('assets/images');

                    $imageModel = new Image();
                    $imageModel->filename = basename($path);
                    $imageModel->blog_id = $blog->id;
                    $imageModel->save();
                }
            }
            event(new BlogCreated($blog));

            return redirect()->route('owners.blog')->with('success', 'Blog đã được tạo thành công!');
        } catch (\Exception $e) {
            Log::error('Không thể tạo blog: ' . $e->getMessage());
            return redirect()->route('owners.blog')->with('error', 'Có lỗi xảy ra khi tạo blog.');
        }
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            return $file->store('images', 'public'); // Store the file and return the path
        }

        return null; 
    }

    public function getAllBlogs(int $perPage = 10)
    {
        try {
            return Blog::where('status', 1)->paginate($perPage);
        } catch (\Exception $e) {
            Log::error('Error fetching blogs: ' . $e->getMessage());
            return null;
        }
    }

    public function getBlogBySlug(string $slug): ?Blog
    {
        try {
            return Blog::where('slug', $slug)->first();
        } catch (\Exception $e) {
            Log::error('Error fetching blog by slug: ' . $e->getMessage());
            return null;
        }
    }

    public function getBlogByTitleAndUserId($title, $userId): ?Blog
    {
        try {
            return Blog::where('title', $title)->where('user_id', $userId)->first();
        } catch (\Exception $e) {
            Log::error('Error fetching blog by title and user ID: ' . $e->getMessage());
            return null;
        }
    }
}
