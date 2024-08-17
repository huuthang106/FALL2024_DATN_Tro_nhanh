<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryAdminController;


Route::prefix('category')->group(function () {
    Route::get('/add-category', [CategoryAdminController::class, 'create'])->name('add-category');
    Route::post('/store', [CategoryAdminController::class, 'store'])->name('store-category');
    Route::get('/update-category', [CategoryAdminController::class, 'update'])->name('update-category');
});
