<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Client\UserClientController;
use App\Http\Controllers\Client\WatchlistClientController;
use App\Services\UserClientServices;

Route::group(['prefix' => ''], function () {
    // Route::get('/dang-nhap', [UserClientController::class, 'login'])->name('login');
    // Route::get('/dang-ki', [UserClientController::class, 'register'])->name('register');
    // Route::get('quen-mat-khau', [UserClientController::class, 'recovery_password'])->name('recovery-password-owners');
    Route::post('/dangky', [UserClientController::class, 'register_user'])->name('register-user');
    Route::post('/dangnhap', [UserClientController::class, 'login_user'])->name('login-user');
    Route::post('/logout', [UserClientController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'nguoi-dang-tin'], function () {
    Route::get('/', [UserClientController::class, 'indexAgent'])->name('client-agent');
    Route::get('chi-tiet/{slug}', [UserClientController::class, 'agentDetail'])->name('client-agent-detail');
    Route::Post('theo-doi/{id}', [WatchlistClientController::class, 'follow'])->name('follow');
    route::delete('huy-theo-doi/{id}', [WatchlistClientController::class, 'unfollow'])->name('unfollow');

});

Route::get('/auth/google', [UserClientController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/google/callback', [UserClientController::class, 'handleGoogleCallback']);
