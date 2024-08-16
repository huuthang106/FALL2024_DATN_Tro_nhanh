<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\CommentOwnersController;

Route::group(['prefix' => ''], function() {
    Route::get('/danh-gia', [CommentOwnersController::class, 'index'])->name('danhgia');
});
