<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\LoginClientController;

Route::group(['prefix' => '', 'as' => 'client.'], function () {
    Route::get('/dang-nhap', [LoginClientController::class, 'login'])->name('login');
    Route::get('/dang-ki', [LoginClientController::class, 'register'])->name('register');
    Route::get('/doi-mat-khau', [LoginClientController::class, 'fogot'])->name('fogot-password');

   
});

