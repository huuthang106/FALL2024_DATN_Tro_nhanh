<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\FavoriteOwnersController;

Route::group(['prefix' => ''], function() {
    Route::get('/yeu-thich', [FavoriteOwnersController::class, 'index'])->name('favorites'); // trang quan li yeu thich
});
