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
    public function addToCart($priceListId)
    {
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

        // Kiểm tra xem chi tiết giỏ hàng đã tồn tại chưa
        $cartDetail = CartDetail::where('cart_id', $cart->id)
            ->where('name_price_list', $priceList->description)
            ->first();

        if (!$cartDetail) {
            // Nếu chưa tồn tại, tạo mới chi tiết giỏ hàng
            $cartDetail = new CartDetail();
            $cartDetail->cart_id = $cart->id;
            $cartDetail->name_price_list = $priceList->description;
            $cartDetail->description = $priceList->description;
            $cartDetail->name_location = $priceList->location->name; // Sử dụng mối quan hệ để lấy tên địa điểm
            $cartDetail->end_date = $priceList->end_date;
            $cartDetail->price = $priceList->price;
            $cartDetail->save();
        }

        return $cart;
    }



    public function getCartDetails($userId)
    {
        $carts = Cart::with('cartDetails')->where('user_id', $userId)->get();

        if ($carts->isEmpty()) {
            return [];
        }

        // Gộp tất cả các chi tiết giỏ hàng từ các giỏ hàng
        $cartDetails = $carts->flatMap(function ($cart) {
            return $cart->cartDetails;
        });

        return $cartDetails;

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
