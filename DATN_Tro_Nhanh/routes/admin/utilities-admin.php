<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UtilitiesAdminController;


Route::prefix('tien-ich')->group(function () {
   
    Route::get('/danh-sach-tien-ich', [UtilitiesAdminController::class, 'listUtilities'])->name('danh-sach-tien-ich');
    

});
