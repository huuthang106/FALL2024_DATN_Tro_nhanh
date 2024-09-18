<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomAdminController;

Route::get('/', [RoomAdminController::class, 'index'])->name('admin');

// Route::prefix('')->group(function () {
//     Route::get('/them-phong', [RoomAdminController::class, 'add_room'])->name('add-room');
//     // Route::get('/chinh-sua-phong', [RoomAdminController::class, 'update_room'])->name('update-room');
// });
Route::prefix('')->group(function () {
    // Route::get('/danh-sach', [RoomAdminController::class, 'show_room'])->name('show-room');
    Route::get('/danh-sach-duyet-phong', [RoomAdminController::class, 'getroom'])->name('accept-room');
    Route::get('/danh-sach-duyett-phong/{id}', [RoomAdminController::class, 'approveRoom'])->name('accept-room-admin');

    Route::get('/danh-sach-tro', [RoomAdminController::class, 'show_room_all'])->name('room-available-all');
    Route::delete('/xoa-phong/{id}', [RoomAdminController::class, 'destroy'])->name('destroy-room');
    Route::put('/khoi-phuc-phong/{id}', [RoomAdminController::class, 'restore'])->name('restore-room');
    Route::get('/thung-rac', [RoomAdminController::class, 'trash'])->name('trash-room');
    Route::delete('/xoa-phong-vinh-vien/{id}', [RoomAdminController::class, 'forceDelete'])->name('forceDelete-room');
    // Route::get('/them-tro', [RoomAdminController::class, 'add_room_show'])->name('add-room-show');
    Route::post('/them-tro', [RoomAdminController::class, 'add_room_test'])->name('add-room');
    Route::get('/chinh-sua-tro/{slug}', [RoomAdminController::class, 'update_room_show'])->name('update-room-show');
    Route::put('/chinh-du-lieu-tro/{id}', [RoomAdminController::class, 'update_room'])->name('update-room');
    // Route::get('/update-room', [RoomAdminController::class, 'update_room'])->name('update-room');
});
