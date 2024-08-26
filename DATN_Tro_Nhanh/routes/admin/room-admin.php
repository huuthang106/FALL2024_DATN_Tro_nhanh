<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomAdminController;

Route::get('/', [RoomAdminController::class, 'index'])->name('admin');

Route::prefix('')->group(function () {
    Route::get('/them-phong', [RoomAdminController::class, 'add_room'])->name('add-room');
    Route::get('/chinh-sua-phong', [RoomAdminController::class, 'update_room'])->name('update-room');
});
Route::prefix('')->group(function () {
    Route::get('/danh-sach', [RoomAdminController::class, 'show_room'])->name('show-room');
    Route::get('/danh-sach-tro', [RoomAdminController::class, 'show_room_available'])->name('show-room-available');
    Route::get('/them-tro', [RoomAdminController::class, 'add_room_show'])->name('add-room-show');
    Route::post('/them-du-lieu-tro', [RoomAdminController::class, 'add_room'])->name('add-room');
    Route::get('/chinh-sua-tro/{slug}', [RoomAdminController::class, 'update_room_show'])->name('update-room-show');
    Route::put('/chinh-du-lieu-tro/{slug}', [RoomAdminController::class, 'update_room'])->name('update-room');
    Route::get('/update-room', [RoomAdminController::class, 'update_room'])->name('update-room');
});
