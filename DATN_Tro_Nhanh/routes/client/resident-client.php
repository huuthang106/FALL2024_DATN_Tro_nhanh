<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\UserOwnersController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Client\ResidentClientController;

Route::post('/dang-ky-khu-tro', [ResidentClientController::class, 'storeResident'])->name('dang-ky-zone');
