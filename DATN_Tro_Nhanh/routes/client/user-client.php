<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Client\UserClientController;
use App\Services\UserClientServices;

Route::group(['prefix' => '', 'as' => 'client.'], function () {
    // Route::get('/dang-nhap', [UserClientController::class, 'login'])->name('login');
    // Route::get('/dang-ki', [UserClientController::class, 'register'])->name('register');
    Route::get('/doi-mat-khau', [UserClientController::class, 'fogot'])->name('fogot-password');
    Route::post('/dangky', [UserClientController::class, 'register_user'])->name('register-user');
    Route::post('/dangnhap', [UserClientController::class, 'login_user'])->name('login-user');
    Route::post('/logout', [UserClientController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'nguoi-dang-tin', 'as' => 'client.'], function () {
    Route::get('/', [UserClientController::class, 'indexAgent'])->name('client-agent');
    Route::get('chi-tiet/{slug}', [UserClientController::class, 'agentDetail'])->name('client-agent-detail');
});

Route::get('/auth/google', [UserClientController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/google/callback', [UserClientController::class, 'handleGoogleCallback']);


