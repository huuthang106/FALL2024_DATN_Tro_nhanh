<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\ZoneOwnersController;

Route::group(['prefix' =>''],function(){
    route::get('them-khu-tro',[ZoneOwnersController::class, 'index'])->name('zone-post');
    route::post('them-khu-tro',[ZoneOwnersController::class, 'store'])->name('zone-start-post');
});