<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\ZoneOwnersController;

Route::group(['prefix' => ''], function () {
    route::get('them-khu-tro', [ZoneOwnersController::class, 'index'])->name('zone-post');
    route::post('them-khu-tro', [ZoneOwnersController::class, 'store'])->name('zone-start-post');
    Route::group(['prefix' => 'khu-tro'], function () {
        route::get('/', [ZoneOwnersController::class, 'listZone'])->name('zone-list');
        route::get('chi-tiet-khu-tro/{slug}', [ZoneOwnersController::class, 'showDetailOwners'])->name('detail-zone');
        route::get('chinh-sua-khu-tro/{slug}', [ZoneOwnersController::class, 'viewUpdate'])->name('zone-view-update');
        route::Put('chinh-sua-khu-tro/{id}', [ZoneOwnersController::class, 'update'])->name('zone-start-update');

    });

});