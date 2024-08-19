<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ZoneAdminController;


Route::prefix('khu-tro')->group(function () {
Route::get('/trang-them-khu-tro',[ZoneAdminController::class, 'addZoneForm'])->name('trang-them-khu-tro');
Route::post('/them-khutro', [ZoneAdminController::class, 'addZone'])->name('them-khutro');
Route::get('/danh-sach-khutro', [ZoneAdminController::class, 'listZone'])->name('danh-sach-khutro');
Route::get('/chinh-sua-khu-tro/{id}', [ZoneAdminController::class, 'editZoneForm'])->name('edit-khu-tro');
Route::put('/chinh-sua/{id}', [ZoneAdminController::class, 'updateZone'])->name('cap-nhat-khutro');

});
