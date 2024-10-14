<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\User;
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
    protected const deductMoney  = 2;
    protected const deductMoneys  = 1;
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
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

public function SaveBill($billId)
{
    $user = Auth::user(); // Lấy người dùng đã xác thực (payer_id)

    // Đảm bảo người dùng đã xác thực và là một instance của model User
    if (!$user instanceof \App\Models\User) {
        return ['success' => false, 'message' => 'Người dùng không hợp lệ.'];
    }

    // Tìm hóa đơn hoặc thất bại    
    $bill = Bill::findOrFail($billId);

    // Kiểm tra nếu hóa đơn tồn tại và lấy số tiền của nó
    if ($bill) {
        $description = $bill->description; // Lấy mô tả hóa đơn
        $billAmount = intval($bill->amount); // Chuyển đổi số tiền thành số nguyên

        // Kiểm tra số dư người dùng
        if ($user->balance < $billAmount) {
            return ['success' => false, 'message' => 'Không thể thanh toán: Số dư không đủ.'];
        }

        // Lấy creator_id từ hóa đơn
        $creator = \App\Models\User::find($bill->creator_id); // Tìm người tạo hóa đơn

        // Trừ số tiền từ payer_id
        $user->balance -= $billAmount;
        $user->save();

        // Cộng số tiền vào creator_id
        if ($creator instanceof \App\Models\User) {
            $creator->balance += $billAmount;
            $creator->save();
            $this->addMoneyTransactionsBill($creator->id, $billId, $billAmount, $description,$user);
        } else {
            return ['success' => false, 'message' => 'Người tạo hóa đơn không hợp lệ.'];
        }

        // Tạo bản ghi giao dịch
        Transaction::create([
            'user_id' => $user->id,
            'bill_id' => $billId,
            'balance' => $user->balance, // Số dư mới sau khi thanh toán
            'description' => $description,
            'added_funds' => $billAmount,
            'status' => self::deductMoney,
        ]);

        // Cập nhật trạng thái hóa đơn và ngày thanh toán
        $bill->status = 2;
        $bill->payment_date = now();
        $bill->save();

        return ['success' => true];
    }

    return ['success' => false];
}

public function addMoneyTransactionsBill($creatorId, $billId, $billAmount)
{
    // Tìm người tạo hóa đơn
    $creator = \App\Models\User::find($creatorId);
    $currentUser = Auth::user(); 

    // Kiểm tra nếu creator và người dùng hiện tại tồn tại
    if ($creator instanceof \App\Models\User && $currentUser instanceof \App\Models\User) {
        // Tạo bản ghi giao dịch cho creator
        Transaction::create([
            'user_id' => $creator->id,
            'bill_id' => $billId,
            'balance' => $creator->balance, // Số dư hiện tại của creator
            'description' => $currentUser->name . ' đã thanh toán!', // Nối tên người dùng hiện tại với thông điệp
            'added_funds' => $billAmount, // Số tiền được thêm vào
            'status' => self::deductMoneys, // Hoặc một trạng thái khác phù hợp
        ]);
    } else {
        // Xử lý trường hợp creator hoặc người dùng hiện tại không hợp lệ
        return ['success' => false, 'message' => 'Người tạo hóa đơn hoặc người dùng hiện tại không hợp lệ.'];
    }

    return ['success' => true];
}


}
