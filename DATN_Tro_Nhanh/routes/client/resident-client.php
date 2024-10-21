<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\UserOwnersController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Client\ResidentClientController;

Route::post('/dat-coc/{id}', [ResidentClientController::class, 'storeResident'])->name('booking');
