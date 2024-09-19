<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Owners\TransactionOwnersController;

// routes/api.php
Route::post('/credit', [TransactionOwnersController::class, 'index']);  
