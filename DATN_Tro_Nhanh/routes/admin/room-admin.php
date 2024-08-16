<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomAdminController;
Route::get('/',[RoomAdminController::class, 'index'])->name('admin');

Route::prefix('')->group(function () {
Route::get('/them-phong',[RoomAdminController::class, 'add_room'])->name('add-room');
Route::get('/chinh-sua-phong',[RoomAdminController::class, 'update_room'])->name('update-room');
});