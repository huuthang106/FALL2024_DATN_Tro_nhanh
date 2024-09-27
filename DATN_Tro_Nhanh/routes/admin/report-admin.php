<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportAdminController;

Route::group(['prefix' => ''], function () {
    route::get('quan-li-bao-cao', [ReportAdminController::class, 'index'])->name('show-report');
    // Route::put('/duyet-bao-cao/{id}', [ReportAdminController::class, 'approve'])->name('approve-report');
    Route::put('/duyet-bao-cao/{id}', [ReportAdminController::class, 'approve'])
        ->name('approve-report')
        ->middleware('auth');  // Thêm middleware nếu cần
    Route::get('/chi-tiet-bao-cao/{id}', [ReportAdminController::class, 'show'])->name('admin.report.show');
});
