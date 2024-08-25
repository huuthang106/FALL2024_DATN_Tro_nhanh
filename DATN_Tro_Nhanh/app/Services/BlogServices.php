<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\BlogCreated;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateBlogRequest;
class BlogServices
{


    private function createSlug($title, $id)
    {
        // Tạo slug từ tiêu đề với thư viện Str của Laravel
        $slug = Str::slug($title, '-');

        // Thêm ID vào slug
        $slug = $slug . '-' . $id;

        return $slug;
    }

    public function handleBlogCreation(CreateBlogRequest $request)
    {
        try {
            // Lấy dữ liệu từ request
            $data = $request->validated();
            $images = $request->uploadImages(); // Gọi phương thức để tải lên ảnh
    
            // Xác thực người dùng
            $userId = Auth::id();
            if (!$userId) {
                throw new \Exception("User not authenticated");
            }
    
            // Tạo blog mới
            $blog = new Blog();
            $blog->title = $data['title'];
            $blog->description = $data['description'];
            $blog->user_id = $userId;
            $blog->save();
    
            // Tạo slug cho blog và lưu vào cơ sở dữ liệu
            $slug = $this->createSlug($data['title'], $blog->id);
            $blog->slug = $slug;
            $blog->save();
    
            // Xử lý lưu ảnh
            foreach ($images as $filename) {
                Image::create([
                    'filename' => $filename,
                    'blog_id' => $blog->id
                ]);
            }
    
            return $blog;
        } catch (\Exception $e) {
            // Ghi log lỗi chi tiết
            Log::error('Lỗi khi xử lý tạo blog: ' . $e->getMessage());
            throw $e; // Ném lại ngoại lệ để xử lý trong controller
        }
    }



    public function editBlog($slug)
    {

        return Blog::where('slug', $slug)->firstOrFail();
    }
    public function updateBlog(Request $request, $slug)
    {
        DB::beginTransaction();

        $blog = Blog::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $blog->title = $data['title'];
        $blog->description = $data['description'];

        // Cập nhật slug nếu tiêu đề thay đổi
        if ($blog->isDirty('title')) {
            $blog->slug = $this->createSlug($data['title'], $blog->id);
        }

        $blog->save();

        // Xử lý ảnh
        if ($request->hasFile('images')) {
            // Xóa ảnh cũ
            $oldImages = Image::where('blog_id', $blog->id)->get();
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('assets/images/' . $oldImage->filename);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $oldImage->delete();
            }

            foreach ($request->file('images') as $image) {
                $originalName = $image->getClientOriginalName();
                $extension = $image->getClientOriginalExtension();
                $filename = $blog->slug . '-' . pathinfo($originalName, PATHINFO_FILENAME) . '-' . time() . '.' . $extension;

                $destinationPath = public_path('assets/images');
                $image->move($destinationPath, $filename);

                $imageModel = new Image();
                $imageModel->filename = $filename;
                $imageModel->blog_id = $blog->id;
                $imageModel->save();
            }
        }

        DB::commit();

        return $blog;
    }
    public function getAllBlogss(int $perPage = 10, $searchTerm = null)
    {
        try {
            $query = Blog::where('status', 1)->paginate($perPage);

            if ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            }
            return $query->paginate($perPage);
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
    public function getAllBlogs(int $perPage = 10, $searchTerm = null)
    {
        try {
            // Xây dựng truy vấn để lấy blog với thông tin liên quan
            $query = Blog::query();

            if ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            }

            // Phân trang và trả về kết quả
            return $query->paginate($perPage);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function deleteBlogBySlug($slug)
    {
        // Tìm blog theo slug
        $blog = Blog::where('slug', $slug)->first();

        // Kiểm tra nếu blog tồn tại
        if (!$blog) {
            return false;
        }

        // Xóa blog
        return $blog->delete();
    }
    public function countTotalBlogs()
    {
        try {
            return Blog::count();
        } catch (\Exception $e) {
            Log::error('Error counting blogs: ' . $e->getMessage());
            return 0;
        }
    }
}
