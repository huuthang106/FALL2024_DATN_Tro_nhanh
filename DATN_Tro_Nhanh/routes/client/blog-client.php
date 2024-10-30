<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\BlogClientController;

// Controller Blog
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogClientController::class, 'indexBlog'])->name('client-blog');
    Route::get('{slug}', [BlogClientController::class, 'blogDetail'])->name('client-blog-detail');
    Route::delete('/xoa-blog/{id}', [BlogClientController::class, 'destroy'])->name('comments.destroy');

});
