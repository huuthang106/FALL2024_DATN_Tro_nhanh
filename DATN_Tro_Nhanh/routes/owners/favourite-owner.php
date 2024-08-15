<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\FavoriteOwnersController;

Route::group(['prefix' => '', 'as' => 'owners.'], function() {
    Route::get('/yeu-thich', [FavoriteOwnersController::class, 'index'])->name('favorites'); // trang quan li yeu thich
});
