<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\RoomClientController;
use App\Services\RoomClientServices;

Route::group(['prefix' => 'danh-sach-phong-tro'], function () {
    Route::get('/', [RoomClientController::class, 'indexRoom'])->name('room-listing');
    // Route::get('ban-do-tro', [RoomClientController::class, 'indexRoomMap'])->name('room-map-listing');
});
//Controller Room


//Nguyen Thai Toan 

Route::group(['prefix' => ''], function () {
    Route::get('/xem-chi-tiet/{slug}', [RoomClientController::class, 'page_detail'])->name('detail-room');
    // routes/web.php
    // Đảm bảo rằng route có tên đúng và chấp nhận slug
    Route::POST('/add-favourite/{slug}', [RoomClientController::class, 'addFavourite'])->name('add.favourite');
});

use App\Http\Controllers\Client\HomeClientController;

Route::get('/', [HomeClientController::class, 'index'])->name('home');
Route::get('/locations', function () {
    $locations = app(RoomClientServices::class)->getUniqueLocations();
    return response()->json($locations);
});
