<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\BlogClientController;

// Controller Blog
Route::group(['prefix' => 'blog', 'as' => 'client.'], function () {
    Route::get('/', [BlogClientController::class, 'indexBlog'])->name('client-blog');
    Route::get('chi-tiet-blog/{slug}', [BlogClientController::class, 'blogDetail'])->name('client-blog-detail');
});
