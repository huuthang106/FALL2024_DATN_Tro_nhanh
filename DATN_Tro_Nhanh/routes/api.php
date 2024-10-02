<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Owners\TransactionOwnersController;
use App\Http\Controllers\Client\RoomClientController;
use App\Http\Controllers\Client\HomeClientController;
use App\Http\Controllers\Client\UserClientController;
use App\Http\Controllers\Client\ZoneClientController;
use App\Http\Controllers\Client\BlogClientController;
use App\Http\Controllers\Client\CategoryClientController;




// routes/api.php
Route::post('/credit', [TransactionOwnersController::class, 'index']);  // api thanh toán trả dưx liệu về từ appscript
Route::get('/get-data-room-listing', [RoomClientController::class, 'indexRoomAPI']); // api lấy dữ liệu danh sách ỷoj 
Route::get('/get-data-category', [CategoryClientController::class, 'getCategory']); // lấy dữ liệu xem chi tiết room
