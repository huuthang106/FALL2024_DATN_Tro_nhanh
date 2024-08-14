<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
//Controller Room

Route::prefix('thong-tin-tai-khoang')->name('admin.')->group(function () {
    Route::get('/',[UserAdminController::class,'index'])->name('profile');
});

