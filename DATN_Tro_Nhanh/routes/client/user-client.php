<?php

use Illuminate\Support\Facades\Route;
//Controller Room
use App\Http\Controllers\Client\UserClientController;

//Nguyen Thai Toan 

//Nguyen Thai Toan 

Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
    Route::get('/trang-quan-ly', [UserClientController::class, 'page_dashboard'])->name('dashboard');
});