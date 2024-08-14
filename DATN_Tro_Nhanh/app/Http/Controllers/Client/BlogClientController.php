<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogClientController extends Controller
{
    //Hiển thị Giao Diện Trang Blog Client
    public function indexBlog()
    {
        return view('client.show.blog-classic');
    }
    // Hiển thị Giao Diện Trang Blog Deital
    public function blogDetail()
    {
        return view('client.show.blog-details-1');
    }
}
