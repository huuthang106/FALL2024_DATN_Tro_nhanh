<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\CartService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CartController extends Controller
{
    protected $cartService;
    protected $priceListId;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart($priceListId)
    {
        $this->cartService->addToCart($priceListId);
        return redirect()->route('client.carts-show')->with('success', 'Gói tin đã được thêm vào giỏ hàng.');
    }


    public function showCart()
    {
        $userId = Auth::id(); // Lấy ID của người dùng hiện tại
        $cartDetails = $this->cartService->getCartDetails($userId); // Không cần priceListId
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
