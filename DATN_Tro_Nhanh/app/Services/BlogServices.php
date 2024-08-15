<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;

class BlogServices
{
    // viết các hàm lấy giá trị của bản đó \
    public function create(array $data): bool
    {
        try {
            // Tạo đối tượng Blog mới
            $blog = new Blog();

            // Gán giá trị cho các thuộc tính của blog
            $blog->title = $data['title'];
            $blog->description = $data['description'];

            // Tạo slug từ title và ID
            $blog->slug = Str::slug($data['title'] . '-' . $blog->id);

            // Lưu đối tượng vào cơ sở dữ liệu
            $blog->save();

            return true;
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có (có thể ghi log hoặc báo lỗi chi tiết hơn)
            return false;
        }
    }
    public function getAllBlogs(int $perPage = 1)
    {
        try {
            // Lấy tất cả các blog từ cơ sở dữ liệu và phân trang
            return Blog::where('status', 1)->paginate($perPage);
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return null;
        }
    }
    public function getBlogBySlug(string $slug): ?Blog
    {
        try {
            // Lấy blog dựa trên slug
            return Blog::where('slug', $slug)->first();
        } catch (\Exception $e) {
            // Xử lý lỗi nếu có
            return null;
        }
    }


}
