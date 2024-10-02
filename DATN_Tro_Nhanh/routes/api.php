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


    Route::get('/get-data-room-home', [HomeClientController::class, 'index']);  // api lấy dữ liệu trọ về cho client home

    Route::get('/get-data-room-listing', [RoomClientController::class, 'indexRoomAPI']);// api lấy dữ liệu danh sách ỷoj 
    
    Route::get('/get-data-owners', [UserClientController::class, 'indexAgent']);// api lấy dư liệu người đăng tin 
    
    Route::get('/get-data-zone-client', [ZoneClientController::class, 'listZoneClient']); // api lấy dữ liệu khu trọ cho client

    Route::get('/get-data-agent-detail/{slug}', [UserClientController::class, 'agentDetail']) ;// apo lấy dữ liệu xem chi tiết người đưa tin

    Route::get('/get-data-blog', [BlogClientController::class, 'indexBlog']); // lấy dữ liệu blog

    Route::get('/get-data-blog-detail/{slug}', [BlogClientController::class, 'blogDetail']); // lấy dữ liệu xem chi tiết blog
    
    Route::get('/get-data-room-detail/{slug}', [RoomClientController::class, 'page_detail']); // lấy dữ liệu xem chi tiết room
   
    Route::get('/get-data-category', [CategoryClientController::class, 'getCategory']); // lấy dữ liệu xem chi tiết room
    Route::get('/get-data-room-category', [RoomClientController::class, 'getRoomInCategory']); // lấy dữ liệu xem chi tiết room

