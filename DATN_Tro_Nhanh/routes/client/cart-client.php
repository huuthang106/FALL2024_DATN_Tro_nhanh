<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
;

Route::group(['prefix' => 'gio-hang'], function () {
    // Route::get('/', [CartController::class, 'index'])->name('carts-index');
    // Route::get('/', [CartController::class, 'showCart'])->name('carts-show');
    // Route::delete('/{id}', [CartController::class, 'removeFromCart'])->name('carts-remove');
    // // Route::get('/cart/add/{priceListId}', [CartController::class, 'addToCart'])->name('client.carts-index');
    // Route::get('them/{priceListId}', [CartController::class, 'addToCart'])->name('carts-add');



   
    Route::get('', [CartController::class, 'showCart'])->name('carts-show');
    Route::post('them-vao-gio-hang', [CartController::class, 'addToCart'])->name('carts-add');
    Route::delete('{cartId}', [CartController::class, 'removeFromCart'])->name('carts-remove');
});
