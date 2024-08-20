<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PriceListAdminController;


Route::prefix('bang-gia')->group(function () {
Route::get('/trang-them-bang-gia',[PriceListAdminController::class, 'addPriceListForm'])->name('trang-them-bang-gia');
Route::post('/them-bang-gia', [PriceListAdminController::class, 'addPriceList'])->name('them-bang-gia');
Route::get('/danh-sach-bang-gia', [PriceListAdminController::class, 'listPriceList'])->name('danh-sach-bang-gia');
Route::get('/chinh-sua-bang-gia/{id}', [PriceListAdminController::class, 'editPriceListForm'])->name('chinh-sua-bang-gia');
Route::put('/cap-nhat-bang-gia/{id}', [PriceListAdminController::class, 'updatePriceList'])->name('cap-nhat-bang-gia');

});
