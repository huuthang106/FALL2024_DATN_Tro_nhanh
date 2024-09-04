<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owners\ChatOwnersController;
Route::group(['prefix' => 'tin-nhan'], function () {
  route::get('/',[ChatOwnersController::class,'index'])->name('chat-owners');
 

  
});