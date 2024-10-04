<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\TransactionOwnersController;


Route::group(['prefix' => ''], function () {
    // thai toan 
    Route::get('/don-rut-tien', [TransactionOwnersController::class, 'getWithdrawMomny'])->name('don-rut-tien');
});