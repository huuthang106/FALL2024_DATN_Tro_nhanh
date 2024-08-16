<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PaymentClientController;

Route::group(['prefix' => 'thanh-toan'], function () {
    Route::get('/hoa-don', [PaymentClientController::class, 'index'])->name('payment');
    Route::get('/thanh-toan-thanh-cong', [PaymentClientController::class, 'show'])->name('payment-sucessful');
});

