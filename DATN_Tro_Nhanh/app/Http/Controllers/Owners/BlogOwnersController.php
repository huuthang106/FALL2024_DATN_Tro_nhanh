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
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only(['title', 'description']);
        $images = $request->file('images');
        $success = $this->BlogService->create($data, $images);
        if ($success) {
            $blog = Blog::where('title', $data['title'])->where('user_id', Auth::id())->first();
            if ($blog) {
                event(new BlogCreated($blog));
            }

            return redirect()->route('owners.blog')->with('success', 'Blog đã được tạo thành công!');
        } else {
            return redirect()->route('owners.blog')->with('error', 'Có lỗi xảy ra khi tạo blog.');
        }
    }

    
    
    
    
   

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('images', 'public'); // Thay đổi lưu trữ để lưu vào thư mục public/images
       
            // Return success response
            return response()->json(['success' => true, 'path' => $path]);
        }
       
        // Return error response if no file is uploaded
        return response()->json(['success' => false, 'message' => 'No file uploaded.']);
    }
    
  

}
