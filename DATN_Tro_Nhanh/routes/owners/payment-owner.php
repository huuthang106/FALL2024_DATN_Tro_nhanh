<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\PaymentOwnersController;

Route::group(['prefix' => 'quan-ly-tai-khoan', 'as' => 'owner.'], function () {
// thai toan 
Route::get('/them-hoa-don', [PaymentOwnersController::class, 'page_add_invoice'])->name('add-invoice');
});