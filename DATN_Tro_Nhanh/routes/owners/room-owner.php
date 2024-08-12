<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\IndexOwnersController;
use App\Http\Controllers\Owners\RoomOwnersController;

// Route::get('danh-sach-hoa-don', [InvoiceAdminController::class, 'index'])->name('invoice-listing');
Route::group(['prefix' => 'danh-sach-hoa-don', 'as' => 'invoice.'], function () {
    Route::get('/', [IndexOwnersController::class, 'indexInvoice'])->name('invoice-listing');
    Route::get('chinh-sua-hoa-don', [IndexOwnersController::class, 'editInvoice'])->name('invoice-edit');
    Route::get('them-moi-hoa-don', [IndexOwnersController::class, 'createInvoice'])->name('invoice-create');
    Route::get('xem-truoc-hoa-don', [IndexOwnersController::class, 'previewInvoice'])->name('invoice-preview');
});

Route::group(['prefix' => 'danh-sach-phong-tro', 'as' => 'room.'], function () {
    Route::get('/', [RoomOwnersController::class, 'indexRoom'])->name('room-listing');
    Route::get('ban-do-tro', [RoomOwnersController::class, 'indexRoomMap'])->name('room-map-listing');
});
