<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\UserOwnersController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Client\IdentityClientController;

Route::post('quan-ly-tai-khoan/dang-ky-ekyc', [IdentityClientController::class, 'store'])->name('dang-kyekyc');
// web.php hoặc api.php
Route::post('/store-data', [IdentityClientController::class, 'storeData'])->name('storedata');