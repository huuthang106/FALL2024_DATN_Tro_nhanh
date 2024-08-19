<?php

namespace App\Providers;

use App\Services\BlogServices;
use Illuminate\Support\ServiceProvider;
use App\Services\RoomOwnersService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        // Cung cấp thông tin người dùng cho view 'components.navbar-owner'
        View::composer('components.navbar-owner', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
    }

    protected $listen = [
        \App\Events\RoomCreated::class => [
            \App\Listeners\SendRoomCreatedNotification::class,
        ],
    ];
    
}
