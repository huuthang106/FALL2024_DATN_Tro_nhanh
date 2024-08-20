<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\FavouriteOwnersController;




Route::group(['prefix' => 'yeu-thich'], function (){
    Route::get('/', [FavouriteOwnersController::class, 'index'])->name('favorites');
    Route::get('xoa/{id}', [FavouriteOwnersController::class, 'remove'])->name('favourites.remove');
    Route::post('them/{slug}', [FavouriteOwnersController::class, 'add'])->name('favourites-add');
});

