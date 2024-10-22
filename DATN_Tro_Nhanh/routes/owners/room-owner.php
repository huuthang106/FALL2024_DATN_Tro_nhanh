<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\IndexOwnersController;
use App\Http\Controllers\Owners\RoomOwnersController;


Route::group(['prefix' => ''], function () {
    Route::get('hoa-don-cua-ban', [IndexOwnersController::class, 'indexInvoice'])->name('invoice-listing');
    Route::get('danh-sach-hoa-don', [IndexOwnersController::class, 'indexBill'])->name('invoice-bill');
    Route::get('chinh-sua-hoa-don', [IndexOwnersController::class, 'editInvoice'])->name('invoice-edit');
    Route::get('them-moi-hoa-don', [IndexOwnersController::class, 'createInvoice'])->name('invoice-create');
    Route::get('xem-chi-tiet-hoa-don/{id}', [IndexOwnersController::class, 'previewInvoice'])->name('invoice-preview');
    Route::post('thanh-toan-hoa-don/{billId}', [IndexOwnersController::class, 'pay'])->name('payment-bill');
    // thai toan 
    Route::get('/them-tro/{slug}', [RoomOwnersController::class, 'page_add_rooms'])->name('add-room');
    // huu thang update laij hamf theem 
// routes/web.php

// DATN_Tro_Nhanh/routes/owners/room-owner.php

// DATN_Tro_Nhanh/routes/owners/room-owner.php

// DATN_Tro_Nhanh/routes/owners/room-owner.php

    Route::put('/sua-phong-tro/{id}', [RoomOwnersController::class, 'editRoom'])->name('edit-room');
    Route::put('/cap-nhat-phong/{id}', [RoomOwnersController::class, 'updateRoom'])->name('update-room');
    // nhan
    Route::group(['prefix' => 'phong-tro'], function () {
        Route::get('/', [RoomOwnersController::class, 'index'])->name('properties');
        Route::delete('/xoa-phong/{id}', [RoomOwnersController::class, 'destroy'])->name('destroy');
        Route::put('/khoi-phuc-phong/{id}', [RoomOwnersController::class, 'restore'])->name('restore');
        Route::get('/thung-rac', [RoomOwnersController::class, 'trash'])->name('trash');
        Route::delete('/xoa-phong-vinh-vien/{id}', [RoomOwnersController::class, 'forceDelete'])->name('forceDelete-room');
        route::get('chinh-sua-phong-tro/{slug}', [RoomOwnersController::class, 'viewUpdate'])->name('room-view-update');
        route::PUT('chinh-sua-phong-tro/{id}', [RoomOwnersController::class, 'update'])->name('room-start-update');
        Route::delete('/xoa-anh/{id}', [RoomOwnersController::class, 'deleteImage'])->name('delete-room-image');
        Route::get('anh/{id}', [RoomOwnersController::class, 'showImages'])->name('room-images');
        // Route::post('/thanh-toan-goi', [RoomOwnersController::class, 'processPayment'])->name('room-vip');
    });
    Route::get('danh-dach-phong-cua-toi', [RoomOwnersController::class, 'house_is_staying'])->name('house-is-staying');

});
