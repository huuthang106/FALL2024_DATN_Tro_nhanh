<?php

namespace App\Services;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;
use Cocur\Slugify\Slugify;
use App\Events\Admin\CategoryAdminEvent;

class CategoryAdminService
{
    public function createCategory(array $data)
    {
        try {
            // Thực hiện các bước tạo mới category
            $category = new Category();
            $category->name = $data['name'];
            $category->status = $data['status'];
            // Tạo slug
            $category->slug = $this->createSlug($data['name']);
            $category->save();
            // Lấy danh sách các danh mục và sắp xếp theo ID giảm dần
            $category = Category::orderBy('id', 'desc')->get();
            return $category;
        } catch (Exception $e) {
            // Ghi log lỗi và hiển thị lỗi ra ngoài
            Log::error('Error creating category: ' . $e->getMessage());
            throw new Exception('Đã xảy ra lỗi khi tạo loại.');
        }
        // try {
        //     $category = new Category();
        //     $category->name = $data['name'];
        //     $category->status = $data['status'];
        //     $category->slug = $this->createSlug($data['name']);
        //     $category->save();

        //     // Tạo thông báo
        //     event(new CategoryAdminEvent(
        //         'Thêm mới loại',
        //         'Loại đã được thêm mới thành công.',
        //         1,
        //         auth()->id()
        //     ));

        //     return $category;
        // } catch (Exception $e) {
        //     Log::error('Error creating category: ' . $e->getMessage());
        //     throw new Exception('Đã xảy ra lỗi khi tạo loại.');
        // }
    }
    // Hàm để lấy danh sách categories
    public function getAllCategories($perPage = 10)
    {
        try {
            // Lấy toàn bộ categories và sắp xếp theo ID giảm dần
            return Category::orderBy('id', 'desc')->paginate($perPage);
        } catch (Exception $e) {
            // Ghi log lỗi và hiển thị lỗi ra ngoài
            Log::error('Error fetching categories: ' . $e->getMessage());
            throw new Exception('Đã xảy ra lỗi khi lấy danh sách loại.');
        }
    }
    // Hàm lấy category theo ID
    public function getCategoryById($slug)
    {
        try {
            // return Category::findOrFail($slug);
            return Category::where('slug', $slug)->firstOrFail();
        } catch (Exception $e) {
            Log::error('Error fetching category by Slug: ' . $e->getMessage());
            throw new Exception('Đã xảy ra lỗi khi lấy thông tin loại.');
        }
    }
    // Hàm chỉnh sửa
    public function updateCategory($slug, array $data)
    {
        try {
            $category = Category::findOrFail($slug);
            $category->name = $data['name'];
            $category->status = $data['status'];
            $category->slug = $this->createSlug($data['name']);
            $category->save();

            return $category;
        } catch (Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());
            throw new Exception('Đã xảy ra lỗi khi cập nhật loại.');
        }
        // try {
        //     // Tìm category bằng slug
        //     $category = Category::findOrFail($slug);

        //     // Cập nhật thông tin category
        //     $category->name = $data['name'];
        //     $category->status = $data['status'];
        //     $category->slug = $this->createSlug($data['name']);
        //     $category->save();

        //     // Lấy ID của người dùng hiện tại
        //     $userId = auth()->id();

        //     // Kích hoạt sự kiện với các tham số phù hợp
        //     event(new CategoryAdminEvent('Cập nhật loại', 'Cập nhật loại thành công.', 1, $userId));

        //     return $category;
        // } catch (Exception $e) {
        //     // Ghi log lỗi và hiển thị lỗi ra ngoài
        //     Log::error('Error updating category: ' . $e->getMessage());
        //     throw new Exception('Đã xảy ra lỗi khi cập nhật loại.');
        // }
    }
    public function searchCategories($query, $perPage = 10)
    {
        try {
            // Tìm kiếm theo tên category và phân trang
            return Category::where('name', 'like', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error searching categories: ' . $e->getMessage());
            throw new Exception('Đã xảy ra lỗi khi tìm kiếm loại.');
        }
    }
    // Hàm tạo Slug
    private function createSlug($name)
    {
        $slugify = new Slugify();
        $slug = $slugify->slugify($name);

        $existingCategory = Category::where('slug', $slug)->first();

        // Nếu slug đã tồn tại, thêm ID vào slug
        if ($existingCategory) {
            $slug = $slug . '-' . (Category::max('id') + 1);
        }

        return $slug;
    }
}
