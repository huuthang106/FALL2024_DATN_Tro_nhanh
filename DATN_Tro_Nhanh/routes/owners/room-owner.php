<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\IndexOwnersController;
use App\Http\Controllers\Owners\RoomOwnersController;


// Route::get('danh-sach-hoa-don', [InvoiceAdminController::class, 'index'])->name('invoice-listing');
Route::group(['prefix' => ''], function () {
    Route::get('danh-sach-hoa-don', [IndexOwnersController::class, 'indexInvoice'])->name('invoice-listing');
    Route::get('chinh-sua-hoa-don', [IndexOwnersController::class, 'editInvoice'])->name('invoice-edit');
    Route::get('them-moi-hoa-don', [IndexOwnersController::class, 'createInvoice'])->name('invoice-create');
    Route::get('xem-truoc-hoa-don', [IndexOwnersController::class, 'previewInvoice'])->name('invoice-preview');
    // thai toan 
    Route::get('/them-tro', [RoomOwnersController::class, 'page_add_rooms'])->name('add-room');
    // nhan
    Route::get('/can-ho', [RoomOwnersController::class, 'index'])->name('properties');
});
