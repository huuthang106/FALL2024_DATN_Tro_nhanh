<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\FavouriteOwnersController;
use App\Http\Controllers\Client\RoomClientController;


Route::group(['prefix' => ''], function() {
    // Route::get('/giao-dien', [FavouriteOwnersController::class, 'show'])->name('index-favourites');
    Route::get('/yeu-thich', [FavouriteOwnersController::class, 'index'])->name('favorites'); 
    Route::get('/xem-chi-tiet/{slug}', [RoomClientController::class, 'page_detail'])->name('detail-room');

    // Route::delete('/xoa/{slug}', [FavouriteOwnersController::class, 'destroyBySlug'])->name('xoa');



});
