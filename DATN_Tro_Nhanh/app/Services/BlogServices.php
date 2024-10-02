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
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BlogServices
{

    private $client;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.clarifai.com/v2/',
            'headers' => [
                'Authorization' => 'Key ' . env('CLARIFAI_API_KEY'),
                'Content-Type' => 'application/json',
            ]
        ]);
    }
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
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Xác thực người dùng
        $userId = Auth::id();
        if (!$userId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Người dùng chưa đăng nhập.'
            ]);
        }

        // Kiểm tra và tải lên ảnh
        $images = $request->file('images');
        $uploadedFilenames = [];
        $violentImages = [];

        foreach ($images as $image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            
            // Kiểm tra ảnh bạo lực
            $imageContent = base64_encode(file_get_contents($image->getRealPath()));
            $violenceScore = $this->checkViolentContent($imageContent);

            if ($violenceScore > 0.5) {
                $violentImages[] = $filename;
            } else {
                // Lưu ảnh nếu an toàn
                $image->move(public_path('assets/images'), $filename);
                $uploadedFilenames[] = $filename;
            }
        }

        // Nếu có ảnh bạo lực, trả về lỗi
        if (!empty($violentImages)) {
            // Xóa các ảnh đã upload
            foreach ($uploadedFilenames as $filename) {
                $path = public_path('assets/images/' . $filename);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Phát hiện ảnh không phù hợp: ' . implode(', ', $violentImages) . '. Vui lòng kiểm tra lại ảnh của bạn.'
            ]);
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
        foreach ($uploadedFilenames as $filename) {
            Image::create([
                'filename' => $filename,
                'blog_id' => $blog->id
            ]);
        }

        return $blog;
    } catch (\Exception $e) {
        Log::error('Lỗi khi xử lý tạo blog: ' . $e->getMessage());
        return response()->json([
            'status' => 'error',
            'message' => 'Có lỗi xảy ra khi tạo blog: ' . $e->getMessage()
        ]);
    }
}

    private function checkViolentContent($imageContent)
    {
        try {
            $response = $this->client->post('models/moderation-recognition/outputs', [
                'json' => [
                    'inputs' => [
                        [
                            'data' => [
                                'image' => [
                                    'base64' => $imageContent
                                ]
                            ]
                        ]
                    ]
                ]
            ]);

            $result = json_decode($response->getBody(), true);
            $concepts = $result['outputs'][0]['data']['concepts'] ?? [];
            $violenceScore = 0;
            
            $inappropriateContent = ['gore', 'explicit', 'drug', 'suggestive', 'weapon'];

            foreach ($concepts as $concept) {
                if (in_array($concept['name'], $inappropriateContent)) {
                    $violenceScore += $concept['value'];
                }
            }
            
            return $violenceScore;
        } catch (\Exception $e) {
            Log::error("Clarifai API error: " . $e->getMessage());
            throw $e;
        }
    }
// Trong BlogService.php
public function getTopViewedBlogs($limit = 3)
{
    return Blog::orderBy('view', 'desc')->take($limit)->get();
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
        $images = Image::where('blog_id', $blog->id)->get(); // Sửa từ $blog->slug thành $blog->id

        // Trả về dữ liệu dưới dạng mảng
        return [
            'blog' => $blog,
            'images' => $images,
        ];
    }
    public function updateBlog(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            $blog = Blog::findOrFail($id);
    
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $blog->title = $data['title'];
            $blog->description = $data['description'];
    
            if ($blog->isDirty('title')) {
                $blog->slug = $this->createSlug($data['title'], $blog->id);
            }
    
            $blog->save();
    
            $violentImages = [];
    
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
    
                // Xử lý ảnh mới
                foreach ($request->file('images') as $image) {
                    // Kiểm tra ảnh bạo lực
                    $imageContent = base64_encode(file_get_contents($image->getRealPath()));
                    $violenceScore = $this->checkViolentContent($imageContent);
    
                    if ($violenceScore > 0.5) {
                        $violentImages[] = $image->getClientOriginalName();
                    } else {
                        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                        $extension = $image->getClientOriginalExtension();
                        $filename = $blog->id . '-' . $originalName . '-' . time() . '.' . $extension;
    
                        $destinationPath = public_path('assets/images');
                        $image->move($destinationPath, $filename);
    
                        Image::create([
                            'filename' => $filename,
                            'blog_id' => $blog->id,
                        ]);
                    }
                }
            }
    
            if (!empty($violentImages)) {
                DB::rollBack();
                return [
                    'success' => false,
                    'message' => 'Phát hiện ảnh không phù hợp: ' . implode(', ', $violentImages) . '. Vui lòng kiểm tra lại ảnh của bạn.'
                ];
            }
    
            DB::commit();
            return ['success' => true, 'message' => 'Blog đã được cập nhật thành công!'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật blog: ' . $e->getMessage()];
        }
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
    public function getMyBlogss(int $userId, int $perPage = 10)
    {
        try {
            $query = Blog::where('user_id', $userId);



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
    
            // Xây dựng truy vấn để lấy blog có trạng thái 1
            $query = Blog::query()->where('status', 1);
    
            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            }
    
            // Sắp xếp các blog theo lượt xem từ cao đến thấp
            $query->orderBy('view', 'desc')->orderBy('created_at', 'desc');
    
            // Phân trang và trả về kết quả
            return $query->paginate($perPage);
        } catch (\Exception $e) {
            return null; // Xử lý lỗi nếu có
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

    public function getTrashedBlogs($searchTerm = null, $timeFilter = null)
{
    $query = Blog::onlyTrashed();

    // Tìm kiếm theo tiêu đề hoặc mô tả
    if ($searchTerm) {
        $query->where(function ($q) use ($searchTerm) {
            $q->where('title', 'like', '%' . $searchTerm . '%')
              ->orWhere('description', 'like', '%' . $searchTerm . '%');
        });
    }

    // Lọc theo thời gian
    if ($timeFilter) {
        switch ($timeFilter) {
            case '1_day':
                $query->where('deleted_at', '>=', now()->subDay());
                break;
            case '7_day':
                $query->where('deleted_at', '>=', now()->subWeek());
                break;
            case '1_month':
                $query->where('deleted_at', '>=', now()->subMonth());
                break;
            case '1_year':
                $query->where('deleted_at', '>=', now()->subYear());
                break;
        }
    }

    return $query->paginate(10);
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
