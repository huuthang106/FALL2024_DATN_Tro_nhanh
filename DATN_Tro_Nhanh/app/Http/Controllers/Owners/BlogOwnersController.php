<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogServices;
use Illuminate\Support\Facades\Log;
use App\Models\Blog; // Import lớp Blog
use App\Models\Image; // Import lớp Image
use App\Events\BlogCreated;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateBlogRequest;
use App\Services\NotificationService;
// use App\Events\BlogCreated;

class BlogOwnersController extends Controller
{
    //
    protected $BlogService;

    public function __construct(BlogServices $BlogService)
    {
        $this->BlogService = $BlogService;
    }
    public function index()
    {
        $userLock = auth()->user();

        // Lấy trạng thái của người dùng hiện tại
     $userStatus =  $userLock ?  $userLock->status : null;
        return view('owners.create.add-new-blog',compact('userStatus'));
    }
    public function show()
    {
        $userId = Auth::id();
        $blogs = $this->BlogService->getMyBlogss($userId);
        return view('owners.show.dashboard-my-blog', compact('blogs'));
    }

    public function editBlog($id)
    {
        $result = $this->BlogService->editBlog($id); // Gọi phương thức từ BlogService
 
        return view('owners.edit.edit-blog', [
            'blog' => $result['blog'],
            'images' => $result['images'],
        ]);
    }

    // public function updateBlog(Request $request, $slug)
    // {
    //     $result = $this->BlogService->updateBlog($request, $slug);


    //     return redirect()->route('owners.show-blog')->with('success', $result['message']);

    // }



    public function updateBlog(CreateBlogRequest $request, $id)
    {
        try {
            $result = $this->BlogService->updateBlog($request, $id);
    
            if ($result['success']) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Blog đã được cập nhật thành công!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $result['message'] ?? 'Có lỗi xảy ra khi cập nhật blog.'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Không thể cập nhật blog: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi cập nhật blog: ' . $e->getMessage()
            ]);
        }
    }


    public function store(CreateBlogRequest $request)
    {
        try {
            $blog = $this->BlogService->handleBlogCreation($request);
    
            if ($blog instanceof \Illuminate\Http\JsonResponse) {
                return $blog; // Trả về response JSON nếu có lỗi từ service
            }
    
            event(new BlogCreated($blog));
    
            return response()->json([
                'status' => 'success',
                'message' => 'Blog đã được tạo thành công!'
            ]);
        } catch (\Exception $e) {
            Log::error('Không thể tạo blog: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra khi tạo blog: ' . $e->getMessage()
            ]);
        }
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->input('ids');

        if (is_array($ids)) {
            // Gọi service để xử lý việc xóa
            $this->blogService->deleteMultiple($ids);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }


    public function destroy($id)
    {
        $this->BlogService->softDeleteBlogs($id);
        return redirect()->route('owners.trash-blog')->with('success', 'Blog đã được chuyển vào thùng rác.');
    }

    public function trash()
    {
        $trashedBlogs = $this->BlogService->getTrashedBlogs();
        return view('owners.trash.trash-blog', compact('trashedBlogs'));
    }

    public function restore($id)
    {
        $this->BlogService->restoreBlogs($id);
        return redirect()->route('owners.show-blog')->with('success', 'Blog đã được khôi phục.');
    }
}
