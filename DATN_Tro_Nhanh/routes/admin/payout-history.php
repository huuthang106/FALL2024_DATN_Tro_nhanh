<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PayoutHistoryAdminController;


Route::prefix('danh-sach-rut-tien')->group(function () {
    Route::get('/', [PayoutHistoryAdminController::class, 'index'])->name('list-payout');
    Route::post('/duyet-rut-tien/{id}', [PayoutHistoryAdminController::class, 'browsePayout'])->name('browse-payout');
    Route::post('/tu-choi-don-rut-tien/{payoutID}', [PayoutHistoryAdminController::class, 'rejectPayout'])->name('reject-payout');
});
