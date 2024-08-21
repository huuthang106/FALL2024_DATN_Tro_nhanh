<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Owners\NotificationOwnersController;
use App\Http\Controllers\Client\RoomClientController;
//Nguyen Thai Toan 

Route::group(['prefix' => ''], function () {
    Route::get('/thong-bao', [NotificationOwnersController::class, 'index'])->name('notification-owners');
    // Route::get('/xem-chi-tiet/{slug}', [RoomClientController::class, 'page_detail'])->name('detail-room');
    // update thông báo
    Route::get('/xem-chi-tiet/{slug}', [NotificationOwnersController::class, 'showDetails'])->name('notification-update');
});
Route::group(['prefix' => ''], function () {});
