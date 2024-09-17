<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\AuthStatusController;

Route::get('/auth-status', [AuthStatusController::class, 'check'])->name('status');