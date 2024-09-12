<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
//Controller Room

Route::prefix('thong-tin-tai-khoan')->name('admin.')->group(function () {
    Route::get('/', [UserAdminController::class, 'index'])->name('profile');
    Route::get('/chinh-sua-ho-so', [UserAdminController::class, 'setting_profile'])->name('setting-profile');
    Route::put('/chinh-sua-ho-so/{slug}', [UserAdminController::class, 'updateProfile'])->name('update-profile');
    Route::get('/danh-sach-nguoi-dung', [UserAdminController::class, 'showuser'])->name('profile-user');
    Route::get('/tin-nhan', [UserAdminController::class, 'private_chat'])->name('private-chat');
    Route::get('/', [UserAdminController::class, 'index'])->name('profile');
});

// Route::get('/tin-nhan', [UserAdminController::class, 'private_chat'])->name('private-chat');
Route::get('/ho-so', [UserAdminController::class, 'show'])->name('profile-admin');
Route::get('/danh-sach-user', [UserAdminController::class, 'showUserRole'])->name('list-user');
Route::put('/chinh-sua-role-admin/{id}', [UserAdminController::class, 'updateRoleAdmin'])->name('update-role-admin');
Route::put('/chinh-sua-role-user/{id}', [UserAdminController::class, 'updateRoleUser'])->name('update-role-user');
