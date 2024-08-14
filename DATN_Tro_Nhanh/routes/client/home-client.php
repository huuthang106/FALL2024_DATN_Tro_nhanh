<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeClientController;


Route::get('/', [HomeClientController::class, 'index'])->name('home');

Route::get('ve-chung-toi', [HomeClientController::class, 'showAbout'])->name('client-about');
Route::get('dich-vu', [HomeClientController::class, 'showService'])->name('client-service');
