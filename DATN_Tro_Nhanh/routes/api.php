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
use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\Owners\RoomOwnersController;



// routes/api.php
Route::post('/credit', [TransactionOwnersController::class, 'index']);  // api thanh toán trả dưx liệu về từ appscript
Route::get('/get-data-room-listing', [RoomClientController::class, 'indexRoomAPI']); // api lấy dữ liệu danh sách ỷoj 
Route::get('/get-data-category', [CategoryClientController::class, 'getCategory']); // lấy dữ liệu xem chi tiết room
Route::post('/check-images', [RoomOwnersController::class, 'checkImages']);
Route::get('/get-data-owners-listing', [UserClientController::class, 'indexAgentJson']);
Route::get('/get-data-owners-detail/{slug}', [UserClientController::class, 'agentDetails']);
// route driver
Route::get('/redirect', [GoogleDriveController::class, 'redirectToGoogle']);
Route::get('/callback', [GoogleDriveController::class, 'handleGoogleCallback']);
Route::post('/upload', [GoogleDriveController::class, 'uploadFile'])->name('upload');
