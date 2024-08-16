<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\RoomClientController;

Route::group(['prefix' => 'danh-sach-phong-tro'], function () {
    Route::get('/', [RoomClientController::class, 'indexRoom'])->name('room-listing');
    Route::get('ban-do-tro', [RoomClientController::class, 'indexRoomMap'])->name('room-map-listing');
});
//Controller Room


//Nguyen Thai Toan 

Route::group(['prefix' => ''], function () {
    Route::get('/xem-chi-tiet', [RoomClientController::class, 'page_detail'])->name('detail-room');

});
use App\Http\Controllers\Client\HomeClientController;

Route::get('/', [HomeClientController::class, 'index'])->name('home');
