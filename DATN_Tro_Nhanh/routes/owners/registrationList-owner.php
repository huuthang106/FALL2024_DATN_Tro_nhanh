<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\UserOwnersController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Owners\RegistrationListOwnersController;
// Route::get('danh-sach-hoa-don', [InvoiceAdminController::class, 'index'])->name('invoice-listing');

Route::post('/dang-ky-thanh-vien', [RegistrationListOwnersController::class, 'store'])->name('dang-ky-thanh-vien');
// web.php hoặc api.php
Route::post('/store-data', [RegistrationListOwnersController::class, 'storeData'])->name('store-data');


