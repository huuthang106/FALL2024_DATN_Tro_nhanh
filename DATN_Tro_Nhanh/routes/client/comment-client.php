<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CommentClientController;



Route::post('/danh-gia', [CommentClientController::class, 'submitReview'])->name('danh-gia');
