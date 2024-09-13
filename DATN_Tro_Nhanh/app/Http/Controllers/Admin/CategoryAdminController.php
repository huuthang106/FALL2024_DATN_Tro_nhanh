<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Services\CategoryAdminService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class CategoryAdminController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryAdminService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    // Hàm để hiển thị danh sách categories
    public function list(Request $request)
    {
        try {
            // Lấy từ khóa tìm kiếm từ request
            $query = $request->input('query', '');

            // Lấy số mục trên mỗi trang từ request hoặc sử dụng giá trị mặc định
            $perPage = $request->input('per_page', 10);

            // Gọi service để tìm kiếm hoặc lấy tất cả nếu không có từ khóa tìm kiếm
            $categories = $query
                ? $this->categoryService->searchCategories($query, $perPage)
                : $this->categoryService->getAllCategories($perPage);

            // Trả về view với danh sách các danh mục
            return view('admincp.show.list-category', compact('categories', 'query'));
        } catch (Exception $e) {
            return back()->withErrors('Đã xảy ra lỗi khi lấy danh sách loại.');
        }
    }
    public function create()
    {
        return view('admincp.create.addCategory');
    }
    // Hàm hiển thị Form Edit
    public function edit($slug)
    {
        try {
            $category = $this->categoryService->getCategoryById($slug);
            return view('admincp.edit.updateCategory', compact('category'));
        } catch (Exception $e) {
            return back()->withErrors('Đã xảy ra lỗi khi lấy thông tin loại.');
        }
    }
    // Xử lý yêu cầu cập nhật
    public function update(Request $request, $slug)
    {
        try {
            // Xử lý cập nhật
            $category = $this->categoryService->updateCategory($slug, $request->all());

            return response()->json(['success' => true, 'data' => $category], 200);
        } catch (Exception $e) {
            // Ghi log lỗi và trả về phản hồi lỗi JSON
            Log::error('Đã xảy ra lỗi khi lưu: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $category = $this->categoryService->createCategory($request->all());
            // return response()->json(['success' => true, 'data' => $category], 200);
            return redirect()->route('admin.list-category')->with('success', 'Loại phòng đã được tạo thành công!');
        } catch (Exception $e) {
            // Log::error('Đã xảy ra lỗi khi lưu: ' . $e->getMessage());
            // return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            return back()->with('error', 'Có lỗi xảy ra khi tạo loại phòng.');
        }
    }

    public function destroy($id)
    {
        $result = $this->categoryService->softDeleteCategory($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('admin.trash-category')->with('success', $result['message']);
    }

    public function trash()
    {
        $trashedCategories = $this->categoryService->getTrashedCategories();
        return view('admincp.trash.trash-category', compact('trashedCategories'));
    }

    public function restore($id)
    {
        $this->categoryService->restoreCategory($id);
        return redirect()->route('admin.list-category')->with('success', 'Loại phòng đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        $result = $this->categoryService->forceDeleteCategory($id);

        if ($result['status'] === 'error') {
            return redirect()->back()->with('error', $result['message']);
        }

        return redirect()->route('admin.trash-category')->with('success', $result['message']);
    }
}
