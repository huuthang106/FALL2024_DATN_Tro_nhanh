<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PriceListAdminController;


Route::prefix('bang-gia')->group(function () {
    Route::get('/trang-them-bang-gia', [PriceListAdminController::class, 'addPriceListForm'])->name('trang-them-bang-gia');
    Route::post('/them-bang-gia', [PriceListAdminController::class, 'addPriceList'])->name('them-bang-gia');

    Route::delete('/xoa-bang-gia/{id}', [PriceListAdminController::class, 'destroy'])->name('destroy-price-list');
    Route::put('/khoi-phuc-bang-gia/{id}', [PriceListAdminController::class, 'restore'])->name('restore-price-list');
    Route::get('/thung-rac-bang-gia', [PriceListAdminController::class, 'trash'])->name('trash-price-list');
    Route::delete('/xoa-bang-gia-vinh-vien/{id}', [PriceListAdminController::class, 'forceDelete'])->name('forceDelete-price-list');
    Route::get('/danh-sach-bang-gia', [PriceListAdminController::class, 'listPriceList'])->name('danh-sach-bang-gia');
    Route::get('/chinh-sua-bang-gia/{id}', [PriceListAdminController::class, 'editPriceListForm'])->name('chinh-sua-bang-gia');
    Route::put('/cap-nhat-bang-gia/{id}', [PriceListAdminController::class, 'updatePriceList'])->name('cap-nhat-bang-gia');

});
