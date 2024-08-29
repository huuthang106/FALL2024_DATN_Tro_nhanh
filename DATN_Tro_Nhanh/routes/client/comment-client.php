<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CommentClientController;



Route::post('/danh-gia', [CommentClientController::class, 'submitReview'])->name('danh-gia');
Route::post('/danh-gia-khu-tro', [CommentClientController::class, 'submitZone'])->name('danh-gia-khu-tro');
Route::post('/binh-luan-blog', [CommentClientController::class, 'submitBlogs'])->name('binh-luan-blog');
Route::post('/danh-gia-nguoi-dung', [CommentClientController::class, 'submitUsers'])->name('danh-gia-nguoi-dung');
