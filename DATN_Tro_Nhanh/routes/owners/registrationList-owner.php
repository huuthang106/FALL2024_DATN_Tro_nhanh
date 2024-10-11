<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\UserOwnersController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Owners\RegistrationListOwnersController;

Route::post('/dang-ky-thanh-vien', [RegistrationListOwnersController::class, 'store'])->name('dang-ky-thanh-vien');
// web.php hoặc api.php
Route::post('/store-data', [RegistrationListOwnersController::class, 'storeData'])->name('store-data');
// routes/web.php

Route::post('/gui-yeu-cau', [RegistrationListOwnersController::class, 'submitRequest'])->name('gui-yeu-cau');



