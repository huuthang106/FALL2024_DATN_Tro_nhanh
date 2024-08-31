<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
//Controller Room

Route::prefix('thong-tin-tai-khoan')->name('admin.')->group(function () {
    Route::get('/', [UserAdminController::class, 'index'])->name('profile');
    Route::get('/chinh-sua-ho-so', [UserAdminController::class, 'setting_profile'])->name('setting-profile');
    Route::put('/chinh-sua-ho-so/{slug}', [UserAdminController::class, 'updateProfile'])->name('update-profile');
Route::get('/tin-nhan', [UserAdminController::class, 'private_chat'])->name('private-chat');

});

Route::get('/tin-nhan',[UserAdminController::class,'private_chat'])->name('private-chat');
    Route::get('/ho-so',[UserAdminController::class,'show'])->name('profile-admin');
