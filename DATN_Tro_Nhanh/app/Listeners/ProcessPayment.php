<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;
use App\Models\Premium;
use App\Models\CartDetail;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProcessPayment
{
    public function handle(PaymentProcessed $event)
    {
        // Log khi listener được gọi
        Log::info('Listener ProcessPayment đã được gọi');
    
        $user = Auth::user(); // Lấy thông tin người dùng hiện tại
        $user_id = $user->id; // Lưu user ID để sử dụng nhiều lần
        
        // Kiểm tra số dư tài khoản
        if ($user->balance < $event->amount) {
            Log::warning('Số dư tài khoản không đủ.', ['user_id' => $user_id]);
            return [
                'success' => false,
                'message' => 'Số dư tài khoản không đủ để thanh toán.',
            ];
        }
    
        foreach ($event->carts as $cart) {
            // Lấy thông tin PriceList từ cart
            $priceList = $cart->priceList;
            $location = $priceList->location;
    
            // Thêm dữ liệu cho đối tượng CartDetail
            $newCartDetail = new CartDetail();
            $newCartDetail->name_price_list = 'Nâng cấp tài khoản';
            $newCartDetail->description = $priceList->description;
            $newCartDetail->quantity = $cart->quantity;
            $newCartDetail->price = $event->amount;
    
            // Gán giá trị cho cột name_location nếu có location
            if ($location) {
                $newCartDetail->name_location = $location->name;
                Log::info('Location name:', ['name_location' => $location->name]);
            } else {
                Log::info('Location not found for price list', ['price_list_id' => $priceList->id]);
            }
    
            $newCartDetail->save();
            Log::info('CartDetail đã được lưu.', ['cart_detail_id' => $newCartDetail->id]);
    
            // Xử lý Premium
            $premium = Premium::where('user_id', $user_id)->first();
            $daysOfPackage = $priceList->duration_day; // Dùng từ priceList
            $totalDays = $daysOfPackage * $cart->quantity;
    
            if ($premium) {
                Log::info('Premium đã tồn tại, đang cập nhật.');
                $currentEndDay = Carbon::parse($premium->end_day);
    
                if ($currentEndDay->greaterThan(Carbon::now())) {
                    $premium->end_day = $currentEndDay->addDays($totalDays)->endOfDay();
                } else {
                    $premium->end_day = Carbon::now()->addDays($totalDays)->endOfDay();
                }
    
                $premium->update_day = Carbon::now();
                Log::info('Premium đã được cập nhật.', ['end_day' => $premium->end_day]);
            } else {
                $premium = new Premium();
                $premium->user_id = $user_id;
                $premium->update_day = Carbon::now();
                $premium->end_day = Carbon::now()->addDays($totalDays)->endOfDay();
                Log::info('Premium mới đã được tạo.', ['end_day' => $premium->end_day]);
            }
    
            $premium->save();
    
            // Cập nhật VIP badge cho người dùng
            $user->has_vip_badge = true;
            $user->vip_expiration_date = $premium->end_day;
            $user->save();
            Log::info('User VIP badge và expiration date đã được cập nhật.', ['vip_expiration_date' => $user->vip_expiration_date]);
    
            // Cập nhật giao dịch trong bảng Transaction
            $transaction = new Transaction();
            $transaction->balance = $user->balance - $event->amount; // Lưu lại số dư sau khi thanh toán
            $transaction->description = 'Thanh toán hóa đơn';
            $transaction->added_funds = -$event->amount; // Thêm dấu trừ vào trước giá trị
            $transaction->total_price = $event->amount;
            $transaction->user_id = $user_id;
    
            $transaction->save(); // Lưu trước khi truy cập id
            Log::info('Transaction đã được tạo.', ['transaction_id' => $transaction->id]);
        }
    
        // Sau khi hoàn tất quá trình, xóa các cart
        foreach ($event->carts as $cart) {   
            $cart->delete();
        }
    
        return [
            'success' => true,
            'message' => 'Thanh toán thành công!',
        ];
    }
    

}
