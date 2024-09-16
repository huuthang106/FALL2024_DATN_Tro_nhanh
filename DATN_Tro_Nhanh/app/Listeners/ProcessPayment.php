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

        foreach ($event->carts as $cart) {
            Log::info('Đang xử lý cart', ['cart_id' => $cart->id]);

            $user_id = Auth::id();
            Log::info('User ID:', ['user_id' => $user_id]);
                
         
            Log::info('Giá của payment.', ['amout' =>  $event->amount]);

              // Lấy thông tin PriceList từ cart
    $priceList = $cart->priceList;

    // Lấy thông tin location từ priceList
    $location = $priceList->location;
            // Thực hiện các thao tác thêm dữ liệu cho đối tượng CartDetail
            $newCartDetail = new CartDetail();
            $newCartDetail->name_price_list = 'Nâng cấp tài khoản';
            $newCartDetail->description = $cart->priceList->description;
            $newCartDetail->quantity = $cart->quantity;
            $newCartDetail->price = $event->amount;

             // Gán giá trị cho cột name_location
    if ($location) {
        $newCartDetail->name_location = $location->name;
        Log::info('Location name:', ['name_location' => $location->name]);
    } else {
        Log::info('Location not found for price list', ['price_list_id' => $priceList->id]);
    }
            $newCartDetail->save();
            Log::info('CartDetail đã được lưu.', ['cart_detail_id' => $newCartDetail->id]);

            // Tìm hoặc tạo mới bản ghi Premium
           
            $premium = Premium::where('user_id', $user_id)->first();

if ($premium) {
    Log::info('Premium đã tồn tại, đang cập nhật.');
    
    // Lấy số ngày của gói mà người dùng mua
    $daysOfPackage = $cart->priceList->duration_day;
    $totalDays = $daysOfPackage * $cart->quantity;

    // Lấy ngày hiện tại và ngày kết thúc hiện tại của premium
    $currentEndDay = Carbon::parse($premium->end_day);

    // Nếu ngày kết thúc hiện tại (currentEndDay) lớn hơn hoặc bằng hiện tại thì cộng dồn vào currentEndDay
    if ($currentEndDay->greaterThan(Carbon::now())) {
        $premium->end_day = $currentEndDay->addDays($totalDays)->endOfDay(); // Thêm endOfDay() để đảm bảo hết hạn vào cuối ngày
    } else {
        // Nếu ngày kết thúc hiện tại đã hết hạn thì bắt đầu tính từ hôm nay
        $premium->end_day = Carbon::now()->addDays($totalDays)->endOfDay(); // Thêm endOfDay() ở đây
    }

    // Cập nhật ngày hiện tại là ngày update
    $premium->update_day = Carbon::now();
    Log::info('Premium đã được cập nhật.', ['end_day' => $premium->end_day]);
} else {
    // Nếu người dùng chưa có Premium thì tạo mới
    $premium = new Premium();
    $premium->user_id = $user_id;
    $premium->update_day = Carbon::now();
    $premium->end_day = Carbon::now()->addDays($cart->priceList->duration_day * $cart->quantity)->endOfDay(); // Sử dụng endOfDay()
    Log::info('Premium mới đã được tạo.', ['end_day' => $premium->end_day]);
}

// Lưu lại premium sau khi cập nhật
$premium->save();            

// Cập nhật thông tin VIP của người dùng
$user = Auth::user();
$user->has_vip_badge = true;
$user->vip_expiration_date = $premium->end_day;
$user->save();
Log::info('User VIP badge và expiration date đã được cập nhật.', ['vip_expiration_date' => $user->vip_expiration_date]);


            // Tạo bản ghi trong bảng transactions
            $transaction = new Transaction();
            $transaction->balance = '0';
            $transaction->description = 'Thanh toán hóa đơn';
            $transaction->total_price = $event->amount;
            $transaction->user_id = $user_id;
            $transaction->save();
            Log::info('Transaction đã được tạo.', ['transaction_id' => $transaction->id]);
        }
    }
}
