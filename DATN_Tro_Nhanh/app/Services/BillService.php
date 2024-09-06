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
use App\Models\Transaction;
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

    public function getBillBySlug($id)
    {
        // Lấy user đang đăng nhập
        $user = Auth::user();

        // Lấy email và phone của user đang đăng nhập
        $email = $user->email;
        $phone = $user->phone; // Nếu cột số điện thoại là 'phone'
        $name = $user->name;
        $address = $user->address;
        // Lấy thông tin bill theo slug
        $bill = Bill::where('id', $id)->first();
        $totalAmount = $bill->sum('amount');
        return [
            'bill' => $bill,
            'email' => $email,
            'phone' => $phone,
            'name' => $name,
            'address' => $address,
            'totalAmount' => $totalAmount
        ];
    }

    public function processPayment($billId)
    {
        $user_id = Auth::user()->id;
        $bill = Bill::findOrFail($billId);

        // Kiểm tra nếu có thông tin hóa đơn
        if ($bill) {
            $description = $bill->description; // Lấy mô tả từ hóa đơn

            // Lưu vào bảng transactions
            Transaction::create([
                'user_id' => $user_id,
                'bill_id' => $billId,
                'balance' => 0,
                'description' => $description,
            ]);
            // Cập nhật trạng thái của hóa đơn và ngày thanh toán
            $bill->update([
                'status' => 2,
                'payment_date' => now(),
            ]);

            return ['success' => true];
        }

        return ['success' => false];
    }

}
