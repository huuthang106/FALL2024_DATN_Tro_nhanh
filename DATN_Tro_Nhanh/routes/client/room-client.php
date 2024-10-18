<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\RoomClientController;
use App\Services\RoomClientServices;
use App\Http\Controllers\Client\HomeClientController;
use App\Http\Controllers\Client\ZoneClientController;
Route::group(['prefix' => 'danh-sach-phong-tro'], function () {
    Route::get('/', [ZoneClientController::class, 'listZoneClient'])->name('room-listing');
    // Route::get('ban-do-tro', [RoomClientController::class, 'indexRoomMap'])->name('room-map-listing');
});
//Controller Room


//Nguyen Thai Toan 

Route::group(['prefix' => ''], function () {
    // Route::get('/xem-chi-tiet/{slug}', [RoomClientController::class, 'page_detail'])->name('detail-room');
    // Route::get('/xem-chi-tiet/{slug}', [RoomClientController::class, 'page_detail_admin'])->name('detail-room-admin');
    // routes/web.php
    // Đảm bảo rằng route có tên đúng và chấp nhận slug
    Route::POST('/add-favourite/{slug}', [RoomClientController::class, 'addFavourite'])->name('add.favourite');
});


Route::get('/', [HomeClientController::class, 'index'])->name('home');
Route::get('/locations', function () {
    $locations = app(RoomClientServices::class)->getUniqueLocations();
    return response()->json($locations);
});
