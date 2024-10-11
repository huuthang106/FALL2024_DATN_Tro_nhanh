<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\UserOwnersController;
use App\Http\Controllers\Auth\PasswordController;


Route::group(['prefix' => '', 'as' => 'profile.'], function () {
    Route::get('/', [UserOwnersController::class, 'indexProfileAdmin'])->name('profile-admin-index');
    Route::put('/sua-ho-so/{id}', [UserOwnersController::class, 'updateProfile'])->name('update-profile');
    Route::get('doi-mat-khau', [UserOwnersController::class, 'indexResetPasswordAdmin'])->name('reset-password-admin-index');
    // Route::get('chinh-sua-hoa-don', [UserOwnersController::class, 'editInvoice'])->name('invoice-edit');
    // Route::get('them-moi-hoa-don', [UserOwnersController::class, 'createInvoice'])->name('invoice-create');
    // Route::get('xem-truoc-hoa-don', [UserOwnersController::class, 'previewInvoice'])->name('invoice-preview');
    //Nguyen Thai Toan 
    Route::get('/trang-quan-ly', [UserOwnersController::class, 'page_dashboard'])->name('dashboard');
    Route::PUT('doi-mat-khau', [UserOwnersController::class, 'changePassword'])->name('reset-password-admin-index');
    // nguyen huu thang
    Route::get('/dang-ky-thanh-vien', [UserOwnersController::class, 'page_register_owner'])->name('resigter-owner');
    Route::get('/dang-ky-ekyc', [UserOwnersController::class, 'page_resigter_ekyc'])->name('resigter-ekyc');
    Route::get('/thong-tin-ekyc', [UserOwnersController::class, 'information_page_ekyc'])->name('information-ekyc');
    Route::delete('/xoa-thong-tin-ekyc', [UserOwnersController::class, 'clear_information'])->name('clear-information');
    Route::post('/cong-khai-thong-tin', [UserOwnersController::class, 'toggleVisibility'])->name('toggle-visibility');
    Route::get('/check-identity-status/{id}', [UserOwnersController::class, 'checkStatus']);
});
