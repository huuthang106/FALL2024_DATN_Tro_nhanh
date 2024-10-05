<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\TransactionOwnersController;
use App\Http\Controllers\Owners\PaymentOwnersController;

Route::group(['prefix' => ''], function () {
    // thai toan 
    Route::get('/don-rut-tien', [TransactionOwnersController::class, 'getWithdrawMomny'])->name('don-rut-tien');

    
    Route::get('/yeu-cau-rut-tien', [TransactionOwnersController::class, 'showRequestPayoutForm'])->name('request-payout');
    Route::post('/gui-yeu-cau-rut-tien', [PaymentOwnersController::class, 'createPayout'])->name('submit-payout-request');
});