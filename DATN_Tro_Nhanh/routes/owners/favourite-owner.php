<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\FavouriteOwnersController;
use App\Http\Controllers\Client\RoomClientController;


Route::group(['prefix' => ''], function() {
    // Route::get('/giao-dien', [FavouriteOwnersController::class, 'show'])->name('index-favourites');
    Route::get('/yeu-thich', [FavouriteOwnersController::class, 'index'])->name('favorites'); 
  
   // routes/web.php
Route::post('add/{slug}', [FavouriteOwnersController::class, 'add'])->name('favourites-add');

    // Route::delete('/xoa/{slug}', [FavouriteOwnersController::class, 'destroyBySlug'])->name('xoa');

    // phần này chỉ gọi controller qua
     // Thằng sẽ gọi sản phẩm của yeeu thích qua trang chi tết
});
