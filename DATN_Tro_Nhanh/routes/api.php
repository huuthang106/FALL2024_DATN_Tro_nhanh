<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// routes/api.php
Route::post('/credit', [TransactionOwnersController::class, 'index']);  
