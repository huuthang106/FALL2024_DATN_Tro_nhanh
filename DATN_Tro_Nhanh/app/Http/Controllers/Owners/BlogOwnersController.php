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
        return view('owners.create.add-new-blog');
    }
    public function show()
    {
        $userId = Auth::id();
        $blogs = $this->BlogService->getMyBlogss( $userId);
        return view('owners.show.dashboard-my-blog', compact('blogs'));
    }
   
    public function editBlog($slug)
    {
        $result = $this->BlogService->editBlog($slug); // Gọi phương thức từ BlogService
    
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
        $request->validate([
            'images' => 'array|max:1', // Giới hạn số lượng ảnh là 1
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $result = $this->BlogService->updateBlog($request, $id);
        
        if ($result['success']) {
            return redirect()->route('owners.show-blog')->with('success', $result['message']);
        } else {
            return redirect()->route('owners.show-blog')->with('error', $result['message']);
        }
    
    }


    public function store(CreateBlogRequest $request)
{
    try {
        $blog = $this->BlogService->handleBlogCreation($request);

        event(new BlogCreated($blog));

        return redirect()->route('owners.blog')->with('success', 'Blog đã được tạo thành công!');
    } catch (\Exception $e) {
        Log::error('Không thể tạo blog: ' . $e->getMessage());
        return redirect()->back()->withInput()->with('error', 'Có lỗi xảy ra khi tạo blog.');
    }
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
