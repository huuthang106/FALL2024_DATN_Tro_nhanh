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

    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            $priceListId = $request->input('price_list_id');
    
            if ($priceListId) {
                try {
                    // Gọi service để thêm vào giỏ hàng
                    $this->cartService->addToCart($priceListId);
    
                    // Sau khi thêm vào giỏ hàng thành công
                    return response()->json(['success' => true]);
                } catch (\Exception $e) {
                    return response()->json(['success' => false, 'error' => 'Đã xảy ra lỗi khi thêm vào giỏ hàng.']);
                }
            } else {
                return response()->json(['success' => false, 'error' => 'Không tìm thấy gói tin.']);
            }
        } else {
            // Nếu chưa đăng nhập, lưu price_list_id vào session và yêu cầu đăng nhập
            $priceListId = $request->input('price_list_id');
            session()->put('price_list_id', $priceListId);
            return response()->json(['success' => false, 'error' => 'Bạn cần đăng nhập để thêm vào giỏ hàng.']);
        }
    }
    


    public function showCart()
{
    $userId = Auth::id(); // Lấy ID của người dùng hiện tại
    $carts = $this->cartService->getCartCollect($userId); // Phương thức getCart() phải trả về Collection

    // Kiểm tra nếu giỏ hàng trống
    if ($carts->isEmpty()) {
        // Xử lý khi giỏ hàng trống, có thể là trả về view khác hoặc thông báo
        return view('client.show.show-carts', [
            'carts' => $carts,
            'totalPrice' => 0, // Tổng tiền bằng 0 khi giỏ hàng trống
        ]);
    }

    // Tính tổng tiền của giỏ hàng
    $totalPrice = $carts->sum(function ($cart) {
        return $cart->priceList->price * $cart->quantity;
    });

    // Trả về view với dữ liệu giỏ hàng và tổng tiền
    return view('client.show.show-carts', [
        'carts' => $carts,
        'totalPrice' => $totalPrice,
    ]);
}



public function removeFromCart(Request $request, $cartDetailId)
{
    $result = $this->cartService->removeFromCart(auth()->id(), $cartDetailId);

    if ($result) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Không thể xóa gói khỏi giỏ hàng']);
    }
}

}
