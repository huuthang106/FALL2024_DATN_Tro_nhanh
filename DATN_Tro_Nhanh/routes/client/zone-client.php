<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\ZoneClientController;

Route::group(['prefix' => 'danh-sach-khu-tro'], function () {
    // Route::get('/', [ZoneClientController::class, 'indexRoom'])->name('room-listing');
    Route::get('/', [ZoneClientController::class, 'listZoneClient'])->name('client-list-zone');
    Route::get('/chi-tiet-khu-tro/{slug}', [ZoneClientController::class, 'showZoneDetailsBySlug'])->name('client-details-zone');
});
