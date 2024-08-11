<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            // các route trong mảng là demo ae cứ tạo file route theo cấu trúc đó
            $adminRoute = [
                'acreage-admin.php',
                'area-admin.php',
                'blog-admin.php',
                'category-admin.php',
                'comment-admin.php',
                'favourite-admin.php',
                'image-admin.php',
                'location-admin.php',
                'maintenanceRequest-admin.php',
                'notification-admin.php',
                'payment-admin.php',
                'price-admin.php',
                'priceList-admin.php',
                'registrationList-admin.php',
                'report-admin.php',
                'resident-admin.php',
                'room-admin.php',
                'roomType-admin.php',
                'transaction-admin.php',
                'user-admin.php',
                'watchlist-admin.php',
                'zone-admin.php'

            ];
            $userRoute = [
                'acreage-client.php',
                'area-client.php',
                'blog-client.php',
                'category-client.php',
                'comment-client.php',
                'favourite-client.php',
                'image-client.php',
                'location-client.php',
                'maintenanceRequest-client.php',
                'notification-client.php',
                'payment-client.php',
                'price-client.php',
                'priceList-client.php',
                'registrationList-client.php',
                'report-client.php',
                'resident-client.php',
                'room-client.php',
                'roomType-client.php',
                'transaction-client.php',
                'user-client.php',
                'watchlist-client.php',
                'zone-client.php'

            ];
            $ownersRoute = [
                'acreage-owner.php',
                'area-owner.php',
                'blog-owner.php',
                'category-owner.php',
                'comment-owner.php',
                'favourite-owner.php',
                'image-owner.php',
                'location-owner.php',
                'maintenanceRequest-owner.php',
                'notification-owner.php',
                'payment-owner.php',
                'price-owner.php',
                'priceList-owner.php',
                'registrationList-owner.php',
                'report-owner.php',
                'resident-owner.php',
                'room-owner.php',
                'roomType-owner.php',
                'transaction-owner.php',
                'user-owner.php',
                'watchlist-owner.php',
                'zone-owner.php'

            ];
            $webRoute = [
                'web.php',
                'auth.php',
                'console.php',

            ];
            foreach ($adminRoute as $route) {
                Route::middleware('web')->prefix('admin')->name('admin.')->group(base_path("routes/admin/{$route}"));
            }
            foreach ($userRoute as $route) {
                Route::middleware('web')->prefix('')->group(base_path("routes/client/{$route}"));
            }
            foreach ($ownersRoute as $route) {
                Route::middleware('web')->prefix('')->group(base_path("routes/owners/{$route}"));
            }
            foreach ($webRoute as $route) {
                Route::middleware('web')->prefix('')->group(base_path("routes/{$route}"));
            }
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
