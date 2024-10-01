<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PayoutHistoryAdminController;


Route::prefix('danh-sach-rut-tien')->group(function () {
    Route::get('/', [PayoutHistoryAdminController::class, 'index'])->name('list-payout');

});
