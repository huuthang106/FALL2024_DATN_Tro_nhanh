<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryAdminController;


Route::prefix('category')->group(function () {
    Route::get('danh-sach-loai', [CategoryAdminController::class, 'list'])->name('list-category');
    Route::get('them-loai', [CategoryAdminController::class, 'create'])->name('add-category');
    Route::post('store', [CategoryAdminController::class, 'store'])->name('store-category');
    Route::get('chinh-sua-loai/{slug}', [CategoryAdminController::class, 'edit'])->name('edit-category');
    Route::put('cap-nhat-loai/{slug}', [CategoryAdminController::class, 'update'])->name('update-category');
});
