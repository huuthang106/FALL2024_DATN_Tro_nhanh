<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\PaymentOwnersController;
use App\Http\Controllers\Owners\TransactionOwnersController;


Route::group(['prefix' => ''], function () {
    // thai toan 
    Route::get('/them-hoa-don', [PaymentOwnersController::class, 'page_add_invoice'])->name('add-invoice');
    Route::get('/lich-su-giao-dich', [TransactionOwnersController::class, 'index'])->name('lich-su-giao-dich');
});