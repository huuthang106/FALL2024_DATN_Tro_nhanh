<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthStatusController;

Route::get('/auth-status', [AuthStatusController::class, 'check'])->name('status');