<?php

namespace App\Services;

use App\Models\PriceList;
use App\Models\Cart;
use App\Models\CartDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartService
{
    private const trangthai = 2;

        public function getCartCollect($userId)
        {
            // Giả sử phương thức này trả về mảng, chuyển đổi nó thành Collection
            return collect(Cart::where('user_id', $userId)->get());
        }

        public function addToCart($priceListId)
        {
      
        //      // Kiểm tra xem người dùng đã đăng nhập chưa
        // if (!Auth::check()) {
        //     // Nếu người dùng chưa đăng nhập, ném ngoại lệ hoặc trả về thông báo
        //     \Log::warning('User is not logged in.');
        //     throw new \Exception('You must be logged in to add items to the cart.');
        // }

        $userId = Auth::id();
        $priceList = PriceList::find($priceListId);

        if (!$priceList) {
            \Log::error('Price list not found for ID: ' . $priceListId);
            throw new \Exception('Price list not found.');
        }

        // Kiểm tra xem giỏ hàng đã tồn tại cho người dùng và gói tin này chưa
        $cart = Cart::where('user_id', $userId)
            ->where('price_list_id', $priceListId)
            ->first();

        if ($cart) {
            // Nếu đã tồn tại, tăng số lượng lên
            $cart->quantity += 1;
            $cart->save();
        } else {
            // Nếu chưa tồn tại, tạo mới giỏ hàng với số lượng ban đầu là 1
            $cart = new Cart();
            $cart->user_id = $userId;
            $cart->price_list_id = $priceListId;
            $cart->quantity = 1;
            $cart->save();

        }

        return $cart;
        }

        public function getCart()
        {
            $userId = Auth::id();
            $carts = Cart::where('user_id', $userId)->get();

        if ($carts->isEmpty()) {
            return [];
        }

        return $carts;
            }

            public function getCartDetails()
            {
                $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)
                    ->where('status', self::trangthai) // Thêm điều kiện status = 2
                    ->get();

        if ($carts->isEmpty()) {
            return [];
        }

        return $carts;
        }

    /**
     * Xử lý thanh toán và cập nhật status của các cart
     *
     * @param array $selectedCartIds
     * @param int $userId
     * @return bool
     */
    public function processPayment(array $selectedCartIds, int $userId): bool
    {
        if (empty($selectedCartIds)) {
            return false;
        }

        // Cập nhật status của các cart được chọn thành 2 (status = 2)
        Cart::whereIn('id', $selectedCartIds)
            ->where('user_id', $userId)
            ->update(['status' => 2]);

        return true;
    }
    public function removeAllFromCart($userId)
{
    return Cart::where('user_id', $userId)->delete();
}
    

    public function addCartDetail(Request $request, $cartDetailId)
    {
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện thanh toán.');
    }

    $userId = Auth::id();
    $selectedItems = $request->input('selected_items');

    if (!$selectedItems) {
        return redirect()->back()->with('error', 'Không có sản phẩm nào được chọn.');
    }

    // Giả sử rằng bạn đã gửi dữ liệu dưới dạng JSON từ JavaScript
    $items = json_decode($selectedItems, true);

    foreach ($items as $item) {
        $name_price_list = $item['name_price_list'];
        $description = $item['description'];
        $price = $item['total-price'];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $cartDetail = CartDetail::where('user_id', $userId)
            ->where('id', $cartDetailId)
            ->first();

        if (!$cartDetail) {
            // Nếu sản phẩm chưa tồn tại, tạo mới bản ghi
            CartDetail::create([
                'name_price_list' => $name_price_list,
                'description' => $description,
                'price' => $price
            ]);
        }
        // Nếu sản phẩm đã tồn tại, không làm gì
    }

    // Chuyển hướng đến trang thanh toán
    return redirect()->route('client.payment')->with('success', 'Thông tin thanh toán đã được chuẩn bị.');
}





public function removeFromCart($userId, $cartDetailId)
{
    // Tìm giỏ hàng của người dùng dựa vào $cartDetailId và $userId
    $cart = Cart::where('user_id', $userId)->where('id', $cartDetailId)->first();

    if ($cart) {
        if ($cart->quantity > 1) {
            $cart->quantity -= 1;
            $cart->save(); // Lưu lại thay đổi
        } else {
            CartDetail::where('id', $cartDetailId)->delete(); // Xóa các chi tiết giỏ hàng
            $cart->delete(); // Xóa giỏ hàng
        }
        return true;
    }
    return false;
}

public function getCoutCart($userId)
{
    return Cart::where('user_id', $userId)->count();
}






    
    
}
