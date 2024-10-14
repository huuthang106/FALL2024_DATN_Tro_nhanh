<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TransactionAdminController;


Route::prefix('danh-sach-nap-tien')->group(function () {
    Route::get('/', [TransactionAdminController::class, 'getDataWithdrawal'])->name('list-withdrawal');
});