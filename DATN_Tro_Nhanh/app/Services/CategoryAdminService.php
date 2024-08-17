<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Log;

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

            return $category;
        } catch (Exception $e) {
            // Ghi log lỗi và hiển thị lỗi ra ngoài
            Log::error('Error creating category: ' . $e->getMessage());
            throw new Exception('Đã xảy ra lỗi khi tạo loại.');
        }
    }

    private function createSlug($name)
    {
        // Xử lý để tạo slug từ tên
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
        $existingCategory = Category::where('slug', $slug)->first();

        // Nếu slug đã tồn tại, thêm ID vào slug
        if ($existingCategory) {
            $slug = $slug . '-' . (Category::max('id') + 1);
        }

        return $slug;
    }
}
