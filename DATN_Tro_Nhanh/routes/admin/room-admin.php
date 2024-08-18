<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomAdminController;

Route::get('/', [RoomAdminController::class, 'index'])->name('admin');

Route::prefix('')->group(function () {
    Route::get('/them-phong', [RoomAdminController::class, 'add_room'])->name('add-room');
    Route::get('/chinh-sua-phong', [RoomAdminController::class, 'update_room'])->name('update-room');
});
Route::prefix('room')->group(function () {
    Route::get('/xem-tro', [RoomAdminController::class, 'show_room'])->name('show-room');
    Route::get('/them-tro', [RoomAdminController::class, 'add_room_show'])->name('add-room-show');
    Route::post('/them-du-lieu-tro', [RoomAdminController::class, 'add_room'])->name('add-room');
    Route::get('/update-room', [RoomAdminController::class, 'update_room'])->name('update-room');
});
