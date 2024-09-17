<?php

namespace App\Services;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;
use Cocur\Slugify\Slugify;
use App\Events\Admin\CategoryAdminEvent;
use App\Models\Room;

class CategoryAdminService
{
    // Trong RoomService hoặc một nơi phù hợp
    public function getRoomsCountByCategoryType()
    {
        $categorys = Category::whereIn('name', ['căn hộ', 'trọ'])
            ->withCount('rooms')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->name => $category->rooms_count];
            });
        return $categorys;
    }

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
    public function updateCategory($id, array $data)
    {
        try {
            // Tìm category bằng ID
            $category = Category::findOrFail($id);
            $category->name = $data['name'];
            $category->status = $data['status'];
            $category->slug = $this->createSlug($data['name']);
            $category->save();

            return $category;
        } catch (Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());
            throw new Exception('Đã xảy ra lỗi khi cập nhật loại.');
        }
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

    public function softDeleteCategory($id)
    {
        // Tìm category theo ID
        $category = Category::findOrFail($id);

        // Kiểm tra xem có phòng nào thuộc category này không
        $hasRooms = Room::where('category_id', $id)->exists();

        if ($hasRooms) {
            // Nếu có phòng thuộc loại này, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Có phòng đang thuộc loại này, không thể xóa.'
            ];
        }

        // Nếu không có phòng thuộc loại này, tiến hành xóa mềm
        $category->delete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Loại phòng đã được chuyển vào thùng rác thành công.'
        ];
    }

    public function getTrashedCategories()
    {
        return Category::onlyTrashed()->get();
    }

    public function restoreCategory($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        return $category;
    }

    public function forceDeleteCategory($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        // Kiểm tra xem có phòng nào thuộc category này không
        $hasRooms = Room::where('category_id', $id)->exists();

        if ($hasRooms) {
            // Nếu có phòng thuộc loại này, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Có phòng đang thuộc loại này, không thể xóa vĩnh viễn.'
            ];
        }

        // Nếu không có phòng thuộc loại này, tiến hành xóa vĩnh viễn
        $category->forceDelete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Loại phòng đã được xóa vĩnh viễn thành công.'
        ];
    }
}
