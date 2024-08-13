<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomAdminController;
Route::get('/admin',[RoomAdminController::class, 'index'])->name('admin');