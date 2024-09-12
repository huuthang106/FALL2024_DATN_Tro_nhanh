<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Owners\WatchlistOwnersController;
use App\Http\Controllers\Client\RoomClientController;
Route::group(['prefix' => 'danh-sach-theo-doi'], function () {
    route::get('/', [WatchlistOwnersController::class, 'index'])->name('watch-list');
    route::get('dang-follower', [WatchlistOwnersController::class, 'index'])->name('watch-list');
    route::get('luot-theo-doi', [WatchlistOwnersController::class, 'is_following'])->name('is-following');


});