<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
//Controller Room

Route::prefix('thong-tin-tai-khoan')->name('admin.')->group(function () {
    Route::get('/',[UserAdminController::class,'index'])->name('profile');
    Route::get('/setting-profile',[UserAdminController::class,'setting_profile'])->name('setting-profile');
});

Route::get('/private_chat',[UserAdminController::class,'private_chat'])->name('private-chat');