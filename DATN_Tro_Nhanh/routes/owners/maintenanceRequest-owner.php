<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\MaintenanceRequestOwnersController;

Route::group(['prefix' => 'danh-sach-sua-chua'], function () {
    route::get('', [MaintenanceRequestOwnersController::class, 'show'])->name('show-fix');
    route::get('/danh-sach-bao-tri', [MaintenanceRequestOwnersController::class, 'showowner'])->name('list-owner-fix');
    Route::delete('/xoa-phong-bao-tri/{id}', [MaintenanceRequestOwnersController::class, 'destroy'])->name('destroy-maintenances');
    Route::put('/khoi-phuc-bao-tri/{id}', [MaintenanceRequestOwnersController::class, 'restore'])->name('restore-maintenance');
    Route::get('/thung-rac-bao-tri', [MaintenanceRequestOwnersController::class, 'trash'])->name('trash-maintenances');
    Route::post('gui-bao-tri', [MaintenanceRequestOwnersController::class, 'sent_for_maintenance'])->name('sent-for-maintenance');
    Route::PUT('/hoan-thanh-bao-tri/{id}', [MaintenanceRequestOwnersController::class, 'finish'])->name('finish-maintenance');
});
