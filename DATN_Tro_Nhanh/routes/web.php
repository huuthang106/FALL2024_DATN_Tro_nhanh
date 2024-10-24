<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeClientController;
use App\Http\Controllers\GoogleDriveController;
Route::fallback(function () {
    return redirect('/');
});
Route::get('/redirect', [GoogleDriveController::class, 'redirectToGoogle']);
Route::get('/callback', [GoogleDriveController::class, 'handleGoogleCallback']);
Route::post('/upload', [GoogleDriveController::class, 'uploadFile'])->name('upload');

// // 

// Route::get('/trang-chu', function () {
//     return view('client.show.home');
// })->middleware(['auth', 'verified'])->name('homes');


// // Route::get('/dashboard', function () {
// //     return view('dashboard');
// // })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
