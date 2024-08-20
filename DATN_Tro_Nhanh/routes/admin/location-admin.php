<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LocationAdminController;


Route::prefix('goi-tin')->group(function () {
    Route::get('/danh-sach', [LocationAdminController::class, 'show_location'])->name('show-location');
    Route::get('/them-goi-tin', [LocationAdminController::class, 'add_location_show'])->name('add-location-show');
    Route::post('/them-du-lieu-goi-tin', [LocationAdminController::class, 'add_location'])->name('add-location');
    Route::get('/chinh-sua-goi-tin/{slug}', [LocationAdminController::class, 'update_location_show'])->name('update-location-show');
    Route::put('/chinh-du-lieu-goi-tin/{slug}', [LocationAdminController::class, 'update_location'])->name('update-location');
});
