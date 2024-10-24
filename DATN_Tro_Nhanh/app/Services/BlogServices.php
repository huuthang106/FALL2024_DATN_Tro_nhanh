<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\BlogCreated;
use App\Models\Notification;
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
        DB::beginTransaction(); // Bắt đầu giao dịch

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

            // Tạo blog mới để lấy ID
            $blog = new Blog();
            $blog->title = $data['title'];
            $blog->description = $data['description'];
            $blog->user_id = $userId;
            $blog->status = 1;
            $blog->save();

            // Kiểm tra và tải lên ảnh
            $images = $request->file('images');
            $uploadedFileIds = []; // Mảng để lưu ID tệp đã tải lên
            $violentImages = [];

            foreach ($images as $image) {
                // Lấy tên gốc của tệp
                $originalFilename = $image->getClientOriginalName(); // Lấy tên gốc của tệp

                // Tạo tên file mới với ID blog và thời gian
                $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . '-' . $blog->id . '-' . time() . '.' . $image->getClientOriginalExtension();

                // Kiểm tra ảnh bạo lực
                $imageContent = base64_encode(file_get_contents($image->getRealPath()));
                $violenceScore = $this->checkViolentContent($imageContent);

                if ($violenceScore > 0.5) {
                    $violentImages[] = $filename;
                } else {
                    // Tải lên hình ảnh vào Google Drive
                    $driveFileId = '1DNPZ0KBCiY27mvOZKFg8IyyarT7PIGVF'; // ID thư mục Google Drive
                    $uploadResult = $this->uploadImageToGoogleDrive($image, $driveFileId, $filename); // Gọi phương thức với tên đã tạo

                    // Lưu ID tệp vào mảng
                    $uploadedFileIds[] = $uploadResult['id']; // Lưu ID tệp đã tải lên

                    // Lưu ảnh nếu an toàn
                    $image->move(public_path('assets/images'), $filename);
                }
            }

            // Nếu có ảnh bạo lực, trả về lỗi và rollback
            if (!empty($violentImages)) {
                // Xóa các ảnh đã upload
                foreach ($uploadedFileIds as $fileId) {
                    // Xóa tệp trên Google Drive nếu cần
                    // Bạn có thể gọi một phương thức để xóa tệp nếu cần
                }

                // Rollback transaction
                DB::rollBack();

                return response()->json([
                    'status' => 'error',
                    'message' => 'Phát hiện ảnh không phù hợp: ' . implode(', ', $violentImages) . '. Vui lòng kiểm tra lại ảnh của bạn.'
                ]);
            }

            // Cập nhật cột image trong bảng blogs với ID tệp
            $blog->image = implode(',', $uploadedFileIds); // Lưu chuỗi ID tệp phân tách bằng dấu phẩy
            $blog->save();

            // Tạo slug cho blog và lưu vào cơ sở dữ liệu
            $slug = $this->createSlug($data['title'], $blog->id);
            $blog->slug = $slug;
            $blog->save();

            DB::commit(); // Commit transaction

            return $blog;
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction
            Log::error('Lỗi khi xử lý tạo blog: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi tạo blog: ' . $e->getMessage()
            ]);
        }
    }
    private function getAccessToken()
    {
        $client = new \GuzzleHttp\Client();
        $refreshToken = env('GOOGLE_DRIVE_REFRESH_TOKEN');
        $clientId = env('GOOGLE_DRIVE_CLIENT_ID');
        $clientSecret = env('GOOGLE_DRIVE_CLIENT_SECRET');

        $response = $client->post('https://oauth2.googleapis.com/token', [
            'form_params' => [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'refresh_token' => $refreshToken,
                'grant_type' => 'refresh_token',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['access_token']; // Trả về access token mới
    }

public function uploadImageToGoogleDrive($image, $folderId, $filename)
{
    $client = new \GuzzleHttp\Client();
    $accessToken = $this->getAccessToken(); // Lấy access token mới

        $response = $client->post('https://www.googleapis.com/upload/drive/v3/files?uploadType=multipart', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'multipart/related; boundary=foo_bar_baz',
            ],
            'body' => "--foo_bar_baz\r\n" .
                "Content-Type: application/json; charset=UTF-8\r\n\r\n" .
                json_encode(['name' => $filename, 'parents' => [$folderId]]) . "\r\n" .
                "--foo_bar_baz\r\n" .
                "Content-Type: " . $image->getClientMimeType() . "\r\n\r\n" .
                file_get_contents($image->getRealPath()) . "\r\n" .
                "--foo_bar_baz--"
        ]);

        return json_decode($response->getBody(), true);
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






    public function editBlog($id)
    {
        // Lấy blog với slug tương ứng
        $blog = Blog::where('id', $id)->firstOrFail();

        // Trả về blog và danh sách ảnh
        return [
            'blog' => $blog,
            'images' => json_decode($blog->image, true) // Giải mã JSON để lấy danh sách ảnh
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
                $blog->slug = $this->createSlug($data['title'], $blog->id); // Sửa lại để tạo slug
            }

            // Xử lý hình ảnh mới
            $violentImages = [];
            $uploadedFileIds = []; // Mảng để lưu ID tệp đã tải lên

            if ($request->hasFile('images')) {
                // Xóa ảnh cũ trên Google Drive
                $oldImageIds = explode(',', $blog->image); // Lấy ID tệp cũ
                foreach ($oldImageIds as $oldImageId) {
                    $this->deleteFileFromGoogleDrive($oldImageId); // Gọi phương thức để xóa tệp
                }

                // Xử lý ảnh mới
                foreach ($request->file('images') as $image) {
                    // Kiểm tra ảnh bạo lực
                    $imageContent = base64_encode(file_get_contents($image->getRealPath()));
                    $violenceScore = $this->checkViolentContent($imageContent);

                    if ($violenceScore > 0.5) {
                        $violentImages[] = $image->getClientOriginalName();
                    } else {
                        // Tạo tên file mới với title và id
                        $slugTitle = Str::slug($data['title'], '-');
                        $filename = $slugTitle . '-' . $blog->id . '-' . time() . '.' . $image->getClientOriginalExtension();

                        // Tải lên hình ảnh vào Google Drive
                        $driveFileId = '1DNPZ0KBCiY27mvOZKFg8IyyarT7PIGVF'; // ID thư mục Google Drive
                        $uploadResult = $this->uploadImageToGoogleDrive($image, $driveFileId, $filename); // Gọi phương thức với tên đã tạo

                        // Lưu ID tệp vào mảng
                        $uploadedFileIds[] = $uploadResult['id']; // Lưu ID tệp đã tải lên
                    }
                }

                // Cập nhật cột image trong bảng blogs với ID tệp
                $blog->image = implode(',', $uploadedFileIds); // Lưu chuỗi ID tệp phân tách bằng dấu phẩy
                $blog->save();
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
    public function deleteFileFromGoogleDrive($fileId)
    {
        $client = new \GuzzleHttp\Client();
        $accessToken = $this->getAccessToken(); // Lấy access token mới
    
        $client->delete("https://www.googleapis.com/drive/v3/files/{$fileId}", [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);
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
    public function getBlogBySlugAdmin(string $slug): ?Blog
    {
        try {
            return Blog::where('slug', $slug)->first();
        } catch (\Exception $e) {
            Log::error('Error fetching blog by slug: ' . $e->getMessage());
            return null;
        }
    }
    public function getTopViewsBlogs($limit = 3)
    {
        return Blog::orderBy('view', 'desc') // Sắp xếp theo lượt xem (view) từ cao xuống thấp
            ->take($limit) // Giới hạn số lượng bài viết
            ->get(); // Lấy dữ liệu
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
    public function hardDeleteBlog($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            // Xóa các hình ảnh liên quan từ cột image trong bảng blogs
            $images = explode(',', $blog->image); // Giả sử các tên file ảnh được lưu dưới dạng chuỗi phân tách bằng dấu phẩy
            foreach ($images as $image) {
                $imagePath = public_path('assets/images/' . $image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Xóa blog
            $blog->forceDelete();

            return true;
        } catch (\Exception $e) {
            \Log::error('Lỗi khi xóa blog: ' . $e->getMessage());
            return false;
        }
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

        // Create notification
        $notification = new Notification(); // Tạo đối tượng Notification
        $notification->user_id = $blog->user_id; // Lấy user_id từ payout
        $notification->data = 'Blog ' . $blog->title . ' của bạn đã bị xóa';
        $notification->type = 'Blog bị xóa';
        $notification->save();

        return $blog;
    }
}
