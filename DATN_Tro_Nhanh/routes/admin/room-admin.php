<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomAdminController;
Route::get('/',[RoomAdminController::class, 'index'])->name('admin');

Route::prefix('room')->group(function () {
Route::get('/add-room',[RoomAdminController::class, 'add_room'])->name('add-room');
Route::get('/update-room',[RoomAdminController::class, 'update_room'])->name('update-room');
});