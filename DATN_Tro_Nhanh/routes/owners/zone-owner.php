<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\ZoneOwnersController;

Route::group(['prefix' =>''],function(){
    route::get('them-khu-tro',[ZoneOwnersController::class, 'index'])->name('zone-post');
    route::post('them-khu-tro',[ZoneOwnersController::class, 'store'])->name('zone-start-post');
    route::get('khu-tro',[ZoneOwnersController::class, 'listZone'])->name('zone-list');
    // Route::get('zones/fetch', [ZoneOwnersController::class, 'fetchZones'])->name('zones.fetch');

});