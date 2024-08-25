<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\MaintenanceRequestOwnersController;

Route::group(['prefix' => 'danh-sach-sua-chua'], function () {
    route::get('',[MaintenanceRequestOwnersController::class, 'show'])->name('show-fix');
 
});