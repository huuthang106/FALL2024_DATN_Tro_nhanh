<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\RoomClientController;

Route::group(['prefix' => 'danh-sach-phong-tro', 'as' => 'room.'], function () {
    Route::get('/', [RoomClientController::class, 'indexRoom'])->name('room-listing');
    Route::get('ban-do-tro', [RoomClientController::class, 'indexRoomMap'])->name('room-map-listing');
});
