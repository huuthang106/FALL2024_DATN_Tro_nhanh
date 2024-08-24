<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart($priceListId)
    {
        $cartDetail = $this->cartService->addToCart(auth()->id(), $priceListId);
        if ($cartDetail) {
            return redirect()->route('client.carts-show')->with('success', 'Đã thêm gói vào giỏ hàng');
        } else {
            return back()->with('error', 'Không thể thêm gói vào giỏ hàng');
        }
    }

    public function showCart()
    {
        $cartDetails = $this->cartService->getCartItems(auth()->id());
        return view('client.show.show-carts', compact('cartDetails'));
    }

    public function removeFromCart($cartDetailId)
    {
        $result = $this->cartService->removeFromCart(auth()->id(), $cartDetailId);
        if ($result) {
            return redirect()->route('client.carts-show')->with('success', 'Đã xóa gói khỏi giỏ hàng');
        } else {
            return back()->with('error', 'Không thể xóa gói khỏi giỏ hàng');
        }
    }
}
