<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\BlogOwnersController;

Route::group(['prefix' => ''], function () {
    route::get('them-blog',[BlogOwnersController::class, 'index'])->name('blog');
    route::post('them-blog',[BlogOwnersController::class, 'store'])->name('create-blog');
});