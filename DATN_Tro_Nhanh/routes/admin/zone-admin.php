<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ZoneAdminController;


Route::prefix('khu-tro')->group(function () {
    // Route::get('/trang-them-khu-tro', [ZoneAdminController::class, 'addZoneForm'])->name('trang-them-khu-tro');
    // Route::post('/them-khutro', [ZoneAdminController::class, 'addZone'])->name('them-khutro');
    // Route::get('/danh-sach-khu-tro', [ZoneAdminController::class, 'listZone'])->name('danh-sach-khutro');
    Route::get('/danh-sach-khu-tro', [ZoneAdminController::class, 'listZone'])->name('danh-sach-khutro');
    Route::delete('/xoa-khu-tro/{id}', [ZoneAdminController::class, 'destroy'])->name('destroy-zone');
    Route::put('/khoi-phuc-khu-tro/{id}', [ZoneAdminController::class, 'restore'])->name('restore-zone');
    Route::get('/thung-rac-khu-tro', [ZoneAdminController::class, 'trash'])->name('trash-zone');
    Route::delete('/xoa-khu-tro-vinh-vien/{id}', [ZoneAdminController::class, 'forceDelete'])->name('forceDelete-zone');
    Route::get('/chi-tiet-khu-tro/{slug}', [ZoneAdminController::class, 'showDetailAdmin'])->name('chi-tiet-khu-tro');
    Route::get('/chinh-sua-khu-tro/{id}', [ZoneAdminController::class, 'editZoneForm'])->name('edit-khu-tro');
    Route::put('/chinh-sua/{id}', [ZoneAdminController::class, 'updateZone'])->name('cap-nhat-khutro');
    // Route::get('/danh-sach-tat-ca-khu-tro', [ZoneAdminController::class, 'listMyZone'])->name('all_zone');

});
