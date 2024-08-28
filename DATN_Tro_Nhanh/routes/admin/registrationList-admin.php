<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegistrationListAdminController;


Route::prefix('don-dang-ky')->group(function () {
    Route::get('/',[RegistrationListAdminController::class, 'index'])->name('list-registers');
    Route::get('chi-tiet-don/{id}',[RegistrationListAdminController::class, 'show'])->name('detail-registers');
    Route::put('xac-nhan-duyet/{id}',[RegistrationListAdminController::class, 'start_approve_application'])->name('start-approve');

});
