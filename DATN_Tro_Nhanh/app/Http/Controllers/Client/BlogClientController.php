<?php

namespace App\Http\Controllers\Client;
use App\Services\BlogServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogClientController extends Controller
{
    //Hiển thị Giao Diện Trang Blog Client
    public function __construct(BlogServices $blogServices)
    {
        $this->blogServices = $blogServices;
    }

    public function indexBlog()
    {
        // Lấy tất cả các blog từ dịch vụ
        $blogs = $this->blogServices->getAllBlogs();

        // Truyền dữ liệu đến view
        return view('client.show.blog-classic', ['blogs' => $blogs]);
    }
    // Hiển thị Giao Diện Trang Blog Deital
    public function blogDetail($slug)
    {
        $blog = $this->blogServices->getBlogBySlug($slug);
        return view('client.show.blog-details-1', ['blog' => $blog]);
    }
}
