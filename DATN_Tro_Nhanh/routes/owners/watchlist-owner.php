<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Owners\WatchlistOwnersController;
use App\Http\Controllers\Client\RoomClientController;
Route::group(['prefix' => 'danh-sach-theo-doi'], function () {
    route::get('/', [WatchlistOwnersController::class, 'index'])->name('watch-list');


});