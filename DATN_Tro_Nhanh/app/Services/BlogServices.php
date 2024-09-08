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

    // In BlogServices.php
    public function handleBlogCreation(Request $request)
    {
        try {
            // Lấy dữ liệu từ request
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Điều kiện cho ảnh
            ]);

            // Kiểm tra và tải lên ảnh
            $images = $this->uploadImages($request);

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

            // Lưu ảnh liên kết với blog
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
            // Ném lại ngoại lệ để xử lý trong controller
            throw $e;
        }
    }

    private function uploadImages(Request $request)
    {
        $uploadedImages = [];

        // Kiểm tra xem có file ảnh nào được gửi trong request không
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Tạo tên file duy nhất với timestamp
                $filename = time() . '_' . $image->getClientOriginalName();
                // Định nghĩa đường dẫn để lưu ảnh
                $path = 'assets/images';
                // Di chuyển ảnh vào thư mục đích
                $image->move(public_path($path), $filename);
                // Thêm tên file vào mảng
                $uploadedImages[] = $filename;
            }
        }

        return $uploadedImages;
    }
//    private function uploadImages(Request $request)
//    {
//        $uploadedImages = [];
   
//        if ($request->hasFile('images')) {
//            foreach ($request->file('images') as $image) {
//                $filename = time() . '_' . $image->getClientOriginalName();
//                $path = 'images'; // Thay đổi thư mục lưu trữ nếu cần
//                $image->storeAs($path, $filename, 'public'); // Sử dụng Storage facade
//                $uploadedImages[] = $filename;
//            }
//        }
   
//        return $uploadedImages;
//    }


    // In CreateBlogRequest.php






    public function editBlog($slug)
    {
        // Lấy blog với slug tương ứng
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Lấy tất cả các hình ảnh của blog
        $images = Image::where('blog_id', $blog->id)->get();

        // Trả về dữ liệu dưới dạng mảng
        return [
            'blog' => $blog,
            'images' => $images,
        ];
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
            // Lấy các ảnh cũ liên quan đến blog từ cơ sở dữ liệu
            $oldImages = Image::where('blog_id', $blog->id)->get();

            // Xóa ảnh cũ khỏi thư mục và cơ sở dữ liệu
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('assets/images/' . $oldImage->filename);

                // Kiểm tra nếu file tồn tại và xóa nó
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Xóa bản ghi ảnh cũ khỏi cơ sở dữ liệu
                $oldImage->delete();
            }

            // Lưu ảnh mới vào thư mục và cơ sở dữ liệu
            foreach ($request->file('images') as $image) {
                // Lấy tên gốc và phần mở rộng của ảnh
                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();

                // Tạo tên file mới dựa trên slug của blog và thời gian hiện tại
                $filename = $blog->slug . '-' . $originalName . '-' . time() . '.' . $extension;

                // Đường dẫn thư mục lưu ảnh
                $destinationPath = public_path('assets/images');
                $image->move($destinationPath, $filename);

                // Lưu thông tin ảnh mới vào cơ sở dữ liệu
                Image::create([
                    'filename' => $filename,
                    'blog_id' => $blog->id,
                ]);
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
    public function getAllBlogs(int $perPage = 8, $searchTerm = null)
    {
        try {
            $userId = Auth::id(); // Lấy ID của người dùng hiện tại

            // Xây dựng truy vấn để lấy blog của người dùng cụ thể với thông tin liên quan
            $query = Blog::query()->where('user_id', $userId);

            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            }
            // Sắp xếp các blog theo ngày tạo mới nhất
            $query->orderBy('created_at', 'desc');

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
    public function softDeleteBlogs($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return $blog;
    }

    public function getTrashedBlogs()
    {
        return Blog::onlyTrashed()->get();
    }

    public function restoreBlogs($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->restore();
        return $blog;
    }

    public function forceDeleteBlogs($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->forceDelete();
        return $blog;
    }
}
