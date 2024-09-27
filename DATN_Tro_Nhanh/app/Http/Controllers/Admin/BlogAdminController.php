<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogServices;
use Illuminate\Support\Facades\Log;
use App\Models\Blog; // Import lớp Blog
use App\Models\Image; // Import lớp Image
use App\Events\BlogCreated;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
use App\Services\NotificationService;
use App\Services\BlogAdminServices;
use App\Http\Requests\CreateBlogRequest;

class BlogAdminController extends Controller
{
    protected $BlogService;
    protected $BlogAdminService;
    public function __construct(BlogServices $BlogService, BlogAdminServices $BlogAdminService)
    {
        $this->BlogService = $BlogService;
        $this->BlogAdminService = $BlogAdminService;
    }
    public function index()
    {
        $userLock = auth()->user();

        // Lấy trạng thái của người dùng hiện tại
        $userStatus =  $userLock ?  $userLock->status : null;
        return view('admincp.create.addBlog', compact('userStatus'));
    }
    public function show()
    {
        $blogs = $this->BlogService->getAllBlogs();
        return view('admincp.show.showBlog', compact('blogs'));
    }

    public function showBlogAll()
    {
        $blogs = $this->BlogAdminService->getBlog();
        return view('admincp.show.showAll-blog', compact('blogs'));
    }

    public function editBlog($slug)
    {
        try {
            // Gọi phương thức editBlog từ service
            $data = $this->BlogService->editBlog($slug);

            // Trả về view với biến blog
            return view('admincp.edit.updateBlog', compact('data'));
        } catch (\Exception $e) {
            Log::error('Không thể lấy blog để chỉnh sửa: ' . $e->getMessage());
            return redirect()->route('admin.sua-blog', $slug)->with('error', 'Có lỗi xảy ra khi lấy blog để chỉnh sửa.');
        }
    }

    public function updateBlog(BlogRequest $request, $id)
    {
        $result = $this->BlogService->updateBlog($request, $id);
        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.show-blog')->with('success', 'Cập nhật Blog thành công.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return back()->with('error', 'Cập nhật Blog thất bại.');
        }
    }



    public function store(CreateBlogRequest $request)
    {
        try {
            // Gọi hàm xử lý blog trong BlogService
            $blog = $this->BlogService->handleBlogCreation($request);

            // Kích hoạt sự kiện BlogCreated
            event(new BlogCreated($blog));

            return redirect()->route('admin.show-blog')->with('success', 'Blog đã được tạo thành công!');
        } catch (\Exception $e) {
            Log::error('Không thể tạo blog: ' . $e->getMessage());
            return redirect()->route('admin.create-blog')->with('error', 'Có lỗi xảy ra khi tạo blog.');
        }
    }

    public function destroy($id)
    {
        $this->BlogService->softDeleteBlogs($id);
        return redirect()->route('admin.trash-blog')->with('success', 'Blog đã được chuyển vào thùng rác.');
    }

    public function trash()
    {
        $trashedBlogs = $this->BlogService->getTrashedBlogs();
        return view('admincp.trash.trash-blog', compact('trashedBlogs'));
    }

    public function restore($id)
    {
        $this->BlogService->restoreBlogs($id);
        return redirect()->route('admin.show-blog')->with('success', 'Blog đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        $this->BlogService->forceDeleteBlogs($id);
        return redirect()->route('admin.trash-blog')->with('success', 'Blog đã được xóa vĩnh viễn.');
    }
}
