<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\ZoneOwnersController;
use App\Http\Controllers\Owners\ResidentOwnersController;

Route::group(['prefix' => ''], function () {
    route::get('them-khu-tro', [ZoneOwnersController::class, 'index'])->name('zone-post');
    route::post('them-khu-tro', [ZoneOwnersController::class, 'store'])->name('zone-start-post');
    Route::group(['prefix' => 'khu-tro'], function () {
        route::get('/', [ZoneOwnersController::class, 'listZone'])->name(name: 'zone-list');
        Route::delete('/xoa-khu-tro/{id}', [ZoneOwnersController::class, 'destroy'])->name('destroy-zone');
        Route::put('/khoi-phuc-khu-tro/{id}', [ZoneOwnersController::class, 'restore'])->name('restore-zone');
        Route::get('/thung-rac-khu-tro', [ZoneOwnersController::class, 'trash'])->name('trash-zone');
        route::get('chi-tiet-khu-tro/{slug}', [ZoneOwnersController::class, 'showDetailOwners'])->name('detail-zone');
        route::get('chinh-sua-khu-tro/{slug}', [ZoneOwnersController::class, 'viewUpdate'])->name('zone-view-update');
        route::Put('chinh-sua-khu-tro/{id}', [ZoneOwnersController::class, 'update'])->name('zone-start-update');
        Route::delete('/xoa/{id}', [ZoneOwnersController::class, 'destroyResident'])->name('resident-destroy');
        Route::post('/tao-hoa-don', [ZoneOwnersController::class, 'storeBill'])->name('bills-store');
        route::Put('xoa-phong/{id}', [ZoneOwnersController::class, 'deleteRoomInZone'])->name('delete-room-in-zone');
        Route::post('them-khu-tro', [ZoneOwnersController::class, 'store'])->name('store-zone');
  



     
    });
});
