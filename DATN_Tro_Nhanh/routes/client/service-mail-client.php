<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ServiceMailClientController;

Route::post('/gui-dich-vu', [ServiceMailClientController::class, 'store'])->name('service-mail-store');
