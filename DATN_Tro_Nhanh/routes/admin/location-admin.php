<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LocationAdminController;


Route::prefix('goi-tin')->group(function () {
    Route::get('/danh-sach', [LocationAdminController::class, 'show_location'])->name('show-location');
    Route::delete('/xoa-goi-tin/{id}', [LocationAdminController::class, 'destroy'])->name('destroy-location');
    Route::put('/khoi-phuc-goi/{id}', [LocationAdminController::class, 'restore'])->name('restore-location');
    Route::get('/thung-rac-goi', [LocationAdminController::class, 'trash'])->name('trash-location');
    Route::delete('/xoa-goi-vinh-vien/{id}', [LocationAdminController::class, 'forceDelete'])->name('forceDelete-location');
    Route::get('/them-goi-tin', [LocationAdminController::class, 'add_location_show'])->name('add-location-show');
    Route::post('/them-du-lieu-goi-tin', [LocationAdminController::class, 'add_location'])->name('add-location');
    Route::get('/chinh-sua-goi-tin/{slug}', [LocationAdminController::class, 'update_location_show'])->name('update-location-show');
    Route::put('/chinh-du-lieu-goi-tin/{id}', [LocationAdminController::class, 'update_location'])->name('update-location');
});
