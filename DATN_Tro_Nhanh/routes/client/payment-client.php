<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PaymentClientController;

Route::group(['prefix' => 'thanh-toan'], function () {
    Route::get('/thanh-toan-thanh-cong', [PaymentClientController::class, 'show'])->name('payment-sucessful');
    Route::post('/hoa-don', [PaymentClientController::class, 'showCheckout'])->name('payment');
    Route::post('/tien-hanh-thanh-toan', [PaymentClientController::class, 'checkout'])->name('payment.process');
    Route::get('/thanh-toan-vn-pay', [PaymentClientController::class, 'vnpayReturn'])->name('vnpay.return');
    Route::get('/thanh-cong', [PaymentClientController::class, 'showPaymentSuccess'])->name('payment.success');
    Route::get('/that-bai', [PaymentClientController::class, 'showPaymentFailure'])->name('payment.failure');
    Route::get('/nap-tien-tai-khoan', [PaymentClientController::class, 'showRecharge'])->name('payment-recharge');
});
