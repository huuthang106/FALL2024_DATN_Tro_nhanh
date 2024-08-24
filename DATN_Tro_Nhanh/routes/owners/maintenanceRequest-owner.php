<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\MaintenanceRequestsController;

Route::group(['prefix' => ''], function () {
    route::get('nhan-tong',[MaintenanceRequestsController::class, 'show'])->name('show-fix');
 
});