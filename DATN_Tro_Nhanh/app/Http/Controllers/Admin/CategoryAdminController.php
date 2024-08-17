<?php

namespace App\Http\Controllers\Admin;

use App\Events\Admin\CategoryAdminEvent;
use Illuminate\Support\Facades\Log;
use App\Services\CategoryAdminService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryAdminService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index() {}

    public function create()
    {
        return view('admincp.create.addCategory');
    }

    public function update()
    {
        return view('admincp.edit.updateCategory');
    }

    public function store(Request $request)
    {
        try {
            // Gọi Service để xử lý
            $category = $this->categoryService->createCategory($request->all());

            // Kích hoạt event sau khi category được thêm
            event(new CategoryAdminEvent($category));

            // Trả về phản hồi JSON thành công
            return response()->json(['success' => true, 'data' => $category], 200);
        } catch (\Exception $e) {
            // Ghi log lỗi và trả về phản hồi lỗi JSON
            Log::error('Đã xảy ra lỗi khi lưu: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
