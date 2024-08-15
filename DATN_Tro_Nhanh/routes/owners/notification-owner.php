<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Owners\NotificationOwnersController;

//Nguyen Thai Toan 

Route::group(['prefix' => '', 'as' => 'owners.'], function () {
    Route::get('/thong-bao', [NotificationOwnersController::class, 'index'])->name('notification-owners');
  
});