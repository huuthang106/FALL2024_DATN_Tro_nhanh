<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners\ResidentOwnersController;

Route::group(['prefix' => ''], function () {
//    nguyen huu thang
        route::get('don-khu-tro', [ResidentOwnersController::class, 'participation_list'])->name('participation-list');
        route::put('duyet-don/{id}', [ResidentOwnersController::class, 'approve_application'])->name('approve-application');
        route::delete('xoa-nguoi-o/{id}', [ResidentOwnersController::class, 'erase_tenant'])->name('erase-tenant');
        route::delete('tu-choi-nguoi-dung/{id}', [ResidentOwnersController::class, 'refuse'])->name('refuse');
        
        route::get('don-da-gui', [ResidentOwnersController::class, 'application_form'])->name('application-form');
        route::delete('huy-don/{id}', [ResidentOwnersController::class, 'cancel_order'])->name('cancel-order');
   
});
