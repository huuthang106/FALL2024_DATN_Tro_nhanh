<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\IndexOwnersController;
use App\Http\Controllers\Owners\RoomOwnersController;


// Route::get('danh-sach-hoa-don', [InvoiceAdminController::class, 'index'])->name('invoice-listing');
Route::group(['prefix' => ''], function () {
    Route::get('danh-sach-hoa-don', [IndexOwnersController::class, 'indexInvoice'])->name('invoice-listing');
    Route::get('danh-sach-hoa-donn', [IndexOwnersController::class, 'indexBill'])->name('invoice-bill');
    Route::get('chinh-sua-hoa-don', [IndexOwnersController::class, 'editInvoice'])->name('invoice-edit');
    Route::get('them-moi-hoa-don', [IndexOwnersController::class, 'createInvoice'])->name('invoice-create');
    Route::get('xem-chi-tiet-hoa-don/{id}', [IndexOwnersController::class, 'previewInvoice'])->name('invoice-preview');
    Route::post('thanh-toan-hoa-don/{billId}', [IndexOwnersController::class, 'pay'])->name('payment-bill');
    // thai toan 
    Route::get('/them-tro', [RoomOwnersController::class, 'page_add_rooms'])->name('add-room');
    Route::post('them-tro', [RoomOwnersController::class, 'store'])->name('store-room');
    // nhan
    Route::group(['prefix' => 'phong-tro'], function () {
        Route::get('/', [RoomOwnersController::class, 'index'])->name('properties');
        Route::delete('/xoa-phong/{id}', [RoomOwnersController::class, 'destroy'])->name('destroy');
        Route::put('/khoi-phuc-phong/{id}', [RoomOwnersController::class, 'restore'])->name('restore');
        Route::get('/thung-rac', [RoomOwnersController::class, 'trash'])->name('trash');
        route::get('chinh-sua-phong-tro/{slug}', [RoomOwnersController::class, 'viewUpdate'])->name('room-view-update');
        route::PUT('chinh-sua-phong-tro/{id}', [RoomOwnersController::class, 'update'])->name('room-start-update');
    });
});
