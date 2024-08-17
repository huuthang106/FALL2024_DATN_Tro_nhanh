<?php

namespace App\Providers;

use App\Services\BlogServices;
use Illuminate\Support\ServiceProvider;
use App\Services\RoomOwnersService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(BlogServices::class, function ($app) {
            return new BlogServices();
        });
        // $this->app->singleton(RoomOwnersService::class, function ($app) {
        //     return new RoomOwnersService();
        // });
        // $this->app->singleton(ImageOwnersService::class, function ($app) {
        //     return new ImageOwnersService();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected $listen = [
        \App\Events\RoomCreated::class => [
            \App\Listeners\SendRoomCreatedNotification::class,
        ],
    ];
}
