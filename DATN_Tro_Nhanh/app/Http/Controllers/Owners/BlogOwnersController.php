<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogServices; // Import dịch vụ tương ứng cho Blog

use App\Http\Requests\CreateBlogRequest;

class BlogOwnersController extends Controller
{
    //
    public function index()
    {
        return view('owners.create.add-new-blog');
    }
   
}
