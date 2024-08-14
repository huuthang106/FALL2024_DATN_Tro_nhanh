<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Client\UserClientController;

Route::group(['prefix' => '', 'as' => 'client.'], function () {
    Route::get('/dang-nhap', [UserClientController::class, 'login'])->name('login');
    Route::get('/dang-ki', [UserClientController::class, 'register'])->name('register');
    Route::get('/doi-mat-khau', [UserClientController::class, 'fogot'])->name('fogot-password');

   
});