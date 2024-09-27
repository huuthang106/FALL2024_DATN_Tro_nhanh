<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryAdminService;

class CategoryClientController extends Controller
{
    //
    protected const STATUS_SHOW = 1;
    protected $categoryService;
    public function __construct(CategoryAdminService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function getCategory(Request $request)
    {
        $category = $this->categoryService->getCategoryClient(self::STATUS_SHOW);
        return response()->json(['categories' => $category]);
    }
}
