<?php

namespace App\Services;

use App\Models\PriceList;
use App\Models\Cart;
use App\Models\CartDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function addToCart($priceListId)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Vui lòng đăng nhập để thanh toán.',
                'redirect' => route('home') // Chuyển hướng người dùng đến trang đăng nhập
            ], 401);
        }

        // Người dùng đã đăng nhập, tiếp tục thêm sản phẩm vào giỏ hàng
        $userId = Auth::id(); // Lấy ID của người dùng hiện tại
        $priceList = PriceList::with('location')->findOrFail($priceListId);

        // Tạo hoặc lấy giỏ hàng hiện tại của người dùng
        $cart = Cart::firstOrCreate(
            ['user_id' => $userId],
            ['price_list_id' => $priceListId]
        );

        // Thêm chi tiết sản phẩm vào giỏ hàng
        $cartDetail = CartDetail::create([
            'cart_id' => $cart->id,
            'name_price_list' => $priceList->description,
            'description' => $priceList->description,
            'name_location' => $priceList->location->name,
            'end_date' => Carbon::now()->addDays($priceList->duration_day),
            'price' => $priceList->price
        ]);

        return response()->json([
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
            'cartDetail' => $cartDetail
        ]);
    }

    public function getCartItems($userId)
    {
        $cart = Cart::where('user_id', $userId)->with('details')->first();
        return $cart ? $cart->details : collect();
    }
    public function removeFromCart($userId, $cartDetailId)
    {
        $cart = Cart::where('user_id', $userId)->first();
        if ($cart) {
            return CartDetail::where('id', $cartDetailId)
                ->where('cart_id', $cart->id)
                ->delete();
        }
        return false;
    }
}
