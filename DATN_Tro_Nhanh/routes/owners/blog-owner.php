<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\BlogOwnersController;

Route::group(['prefix' => '', 'as'=>'owers.'], function () {
    route::get('them-blog',[BlogOwnersController::class, 'index'])->name('blog');
});