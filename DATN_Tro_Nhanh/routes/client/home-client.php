<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeClientController;


Route::get('/', [HomeClientController::class, 'index'])->name('home');
