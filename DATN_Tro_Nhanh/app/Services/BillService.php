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
use Illuminate\Foundation\Auth\User as Authenticatable;
class BillService
{
    public function getCurrentUserBills(int $perPage = 10, $searchTerm = null)
    {
        try {
            // Lấy user hiện tại
            $userId = Auth::id();

            // Xây dựng truy vấn để lấy các Bill của user cụ thể
            $query = Transaction::where('user_id', $userId);

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

    public function getTransationOwners()
    {
        $bills = Transaction::all();
    }
    public function getBillsByCreatorId(int $perPage = 10, $searchTerm = null)
    {
        try {
            // Lấy user hiện tại
            $userId = Auth::id();
    
            // Xây dựng truy vấn để lấy các Bill của user cụ thể và load thông tin người dùng liên quan
            $query = Bill::where('creator_id', $userId)
                         ->with('creator'); // Sử dụng with để lấy thông tin từ mối quan hệ
    
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
    
    // public function getCurrentCreatorBills(int $perPage = 10, $searchTerm = null)
    // {
    //     try {
    //         // Lấy user hiện tại
    //         $userId = Auth::id();
    
    //         // Xây dựng truy vấn để lấy các Bill của user cụ thể và load thông tin người dùng liên quan
    //         $query = Bill::where('creator_id', $userId)
    //                      ->with('creator_id'); // Sử dụng with để lấy thông tin từ mối quan hệ
    
    //         // Nếu có từ khóa tìm kiếm, lọc theo từ khóa trong các trường liên quan
    //         if ($searchTerm) {
    //             $query->where(function ($q) use ($searchTerm) {
    //                 $q->where('invoice_number', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('description', 'like', '%' . $searchTerm . '%')
    //                     ->orWhere('amount', 'like', '%' . $searchTerm . '%');
    //             });
    //         }
    
    //         // Phân trang và trả về kết quả
    //         return $query->paginate($perPage);
    //     } catch (\Exception $e) {
    //         // Xử lý ngoại lệ và trả về null nếu có lỗi xảy ra
    //         return null;
    //     }
    // }

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
        // dd($bill);
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
    $user = Auth::user(); // Get the authenticated user

    // Ensure the user is authenticated and is an instance of the User model
    if (!$user instanceof \App\Models\User) {
        return ['success' => false, 'message' => 'Người dùng không hợp lệ.'];
    }

    // Find the bill or fail
    $bill = Bill::findOrFail($billId);

    // Check if the bill exists and retrieve its amount
    if ($bill) {
        $description = $bill->description; // Get the bill description
        $billAmount = $bill->amount; // Assuming 'amount' is a field in the bills table

        // Check user balance
        if ($user->balance < $billAmount) {
            return ['success' => false, 'message' => 'Không thể thanh toán: Số dư không đủ.'];
        }

        // Create the transaction record
        Transaction::create([
            'user_id' => $user->id,
            'bill_id' => $billId,
            'balance' => $user->balance - $billAmount, // New balance after payment
            'description' => $description,
        ]);

        // Update the bill status and payment date
        $bill->status = 2;
        $bill->payment_date = now();
        $bill->save(); // Use save method to update the bill

        // Update the user's balance
        $user->balance -= $billAmount; // Deduct the amount from user's balance
        $user->save(); // Save the updated user instance

        return ['success' => true];
    }

    return ['success' => false];
}



    

}
