<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ReportClientController;


Route::group(['prefix' => 'gui-bao-cao'], function () {
    Route::get('/phong-tro/{slug}', [ReportClientController::class, 'show_create_report_room'])->name('show-create-report-room');
    Route::get('/khu-tro/{slug}', [ReportClientController::class, 'show_create_report_zone'])->name('show-create-report-zone');
    Route::post('/gui-don-khu-tro', [ReportClientController::class, 'store_zone'])->name('report-store-zone');
    // Route::post('/gui-don-phong-tro', [ReportClientController::class, 'store_room'])->name('report-store-room');
});
