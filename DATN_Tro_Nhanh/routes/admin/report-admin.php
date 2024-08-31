<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReportAdminController;

Route::group(['prefix' => ''], function () {
    route::get('quan-li-report-admin', [ReportAdminController::class, 'index'])->name('show-report');
    Route::put('/duyet-bao-cao/{id}', [ReportAdminController::class, 'approve'])->name('approve-report');
});