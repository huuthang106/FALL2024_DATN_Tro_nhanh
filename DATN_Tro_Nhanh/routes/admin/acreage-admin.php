<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AcreageAdminController;


Route::prefix('dien-tich')->group(function () {
    Route::get('/danh-sach', [AcreageAdminController::class, 'show_acreage'])->name('show-acreage');
    Route::get('/them-dien-tich', [AcreageAdminController::class, 'add_acreage_show'])->name('add-acreage-show');
    Route::post('/them-du-lieu-dien-tich', [AcreageAdminController::class, 'add_acreage'])->name('add-acreage');
    Route::get('/chinh-sua-dien-tich/{id}', [AcreageAdminController::class, 'update_acreage_show'])->name('update-acreage-show');
    Route::put('/chinh-du-lieu-dien-tich/{id}', [AcreageAdminController::class, 'update_acreage'])->name('update-acreage');
});
