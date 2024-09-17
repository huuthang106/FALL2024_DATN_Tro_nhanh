<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogAdminController;

Route::group(['prefix' => ''], function () {
    route::get('quan-li-blog-admin', [BlogAdminController::class, 'show'])->name('show-blog');
    route::get('danh-sach-blog-admin', [BlogAdminController::class, 'showBlogAll'])->name('show-blog-admin');
    route::get('them-blog-admin', [BlogAdminController::class, 'index'])->name('blog');
    Route::delete('/xoa-blog/{id}', [BlogAdminController::class, 'destroy'])->name('destroy-blog');
    Route::put('/khoi-phuc-blog/{id}', [BlogAdminController::class, 'restore'])->name('restore-blog');
    Route::get('/thung-rac-blog', [BlogAdminController::class, 'trash'])->name('trash-blog');
    Route::delete('/xoa-blog-vinh-vien/{id}', [BlogAdminController::class, 'forceDelete'])->name('forceDelete-blog');

    Route::get('sua-blog/{slug}', [BlogAdminController::class, 'editBlog'])->name('sua-blog');
    Route::put('sua-blog/{id}', [BlogAdminController::class, 'updateBlog'])->name('update-blog');

    route::post('them-blog-admin', [BlogAdminController::class, 'store'])->name('create-blog');
    Route::post('/upload-image', [BlogAdminController::class, 'uploadImage'])->name('upload-image');
});
