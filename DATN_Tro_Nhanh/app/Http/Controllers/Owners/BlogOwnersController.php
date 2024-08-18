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
    
    public function store(CreateBlogRequest $request)
    {
        return $this->BlogService->handleBlogCreation($request);
    }

    public function uploadImage(Request $request)
    {
        $path = $this->BlogService->uploadImage($request);

        if ($path) {
            return response()->json(['success' => true, 'path' => $path]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.']);
    }
}
