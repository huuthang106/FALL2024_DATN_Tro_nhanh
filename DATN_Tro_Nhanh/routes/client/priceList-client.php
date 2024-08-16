<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\PriceListClientController;

Route::group(['prefix' => 'goi',], function () {
    Route::get('/thong-tin-goi', [PriceListClientController::class, 'index'])->name('package');

});

