<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogAdminController;

Route::group(['prefix' => ''], function () {
    route::get('quan-li-blog-admin',[BlogAdminController::class, 'show'])->name('show-blog');
    route::get('them-blog-admin',[BlogAdminController::class, 'index'])->name('blog');
    // Route::delete('xoa/{slug}', [BlogOwnersController::class, 'destroy'])->name('xoa-blog');

    Route::get('sua-blog/{slug}', [BlogAdminController::class, 'editBlog'])->name('sua-blog');
    Route::put('sua-blog/{slug}', [BlogAdminController::class, 'updateBlog'])->name('update-blog');

    route::post('them-blog-admin',[BlogAdminController::class, 'store'])->name('create-blog');
    Route::post('/upload-image', [BlogAdminController::class, 'uploadImage'])->name('upload-image');
});