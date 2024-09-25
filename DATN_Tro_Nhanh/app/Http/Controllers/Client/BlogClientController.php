<?php

namespace App\Http\Controllers\Client;

use App\Services\BlogServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CommentClientService;

class BlogClientController extends Controller
{
    protected $blogServices;
    protected $commentClientService;
    //Hiển thị Giao Diện Trang Blog Client
    public function __construct(BlogServices $blogServices, CommentClientService $commentClientService)
    {
        $this->blogServices = $blogServices;
        $this->commentClientService = $commentClientService;
    }

    public function indexBlog(Request $request, $perPage = 10)
    {
        // Nhận từ khóa tìm kiếm từ request (nếu có)
        $searchTerm = $request->input('search');
        // Lấy tất cả các blog từ dịch vụ
        $blogs = $this->blogServices->getAllBlogs((int) $perPage, $searchTerm);
        // Kiểm tra xem yêu cầu có phải là AJAX hay không
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'blogs' => $blogs,
                'searchTerm' => $searchTerm,
            ]);
        }

        // Truyền dữ liệu đến view
        return view('client.show.blog-classic', ['blogs' => $blogs, 'searchTerm' => $searchTerm]);
    }

    // Hiển thị Giao Diện Trang Blog Deital
    public function blogDetail($slug)
    {
        $blog = $this->commentClientService->getBlogWithComments($slug);
        // Kiểm tra xem yêu cầu có phải là AJAX hay không
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'blog' => $blog,
            ]);
        }

        // Nếu không phải là AJAX, trả về view
        return view('client.show.blog-details-1', ['blog' => $blog]);
    }
}
