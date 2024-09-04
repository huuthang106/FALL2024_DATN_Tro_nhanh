<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\BlogCreated;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateBlogRequest;
class BillService
{
    public function getCurrentUserBills(int $perPage = 10, $searchTerm = null)
    {
        try {
            // Lấy user hiện tại
            $userId = Auth::id();

            // Xây dựng truy vấn để lấy các Bill của user cụ thể
            $query = Bill::where('payer_id', $userId);

            // Nếu có từ khóa tìm kiếm, lọc theo từ khóa trong các trường liên quan
            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('invoice_number', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%')
                        ->orWhere('amount', 'like', '%' . $searchTerm . '%');
                });
            }

            // Phân trang và trả về kết quả
            return $query->paginate($perPage);
        } catch (\Exception $e) {
            // Xử lý ngoại lệ và trả về null nếu có lỗi xảy ra
            return null;
        }
    }
}
