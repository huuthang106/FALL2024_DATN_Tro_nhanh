<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\PaymentOwnersController;

Route::group(['prefix' => ''], function () {
    // thai toan 
    Route::get('/them-hoa-don', [PaymentOwnersController::class, 'page_add_invoice'])->name('add-invoice');
    Route::get('/lich-su-giao-dich', [PaymentOwnersController::class, 'showCurrentUserTransactions'])->name('lich-su-giao-dich');
});