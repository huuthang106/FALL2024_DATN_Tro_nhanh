<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ZoneAdminController;


Route::prefix('khu-tro')->group(function () {
Route::get('/trang-them-khu-tro',[ZoneAdminController::class, 'addZoneForm'])->name('trang-them-khu-tro');
Route::post('/them-khutro', [ZoneAdminController::class, 'addZone'])->name('them-khutro');
});
