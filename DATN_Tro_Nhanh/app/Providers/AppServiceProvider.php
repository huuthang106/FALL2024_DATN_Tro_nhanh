<?php

namespace App\Providers;

use App\Services\BlogServices;
use Illuminate\Support\ServiceProvider;
use App\Services\NotificationOwnersService;
use App\Services\RoomOwnersService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Services\FavouritesServices;
use App\Services\MaintenanceRequestsServices;

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
    // public function boot(): void
    // {
    //     //
    // }
    // Biến để xem thông báo
    public function boot(NotificationOwnersService $notificationService,BlogServices $blogServices, RoomOwnersService $roomOwnersService, FavouritesServices $favouriteService, MaintenanceRequestsServices $maintenanceRequestsService)
    {
        // Cung cấp thông tin người dùng cho view 'components.navbar-owner'
        View::composer('components.navbar-owner', function ($view) use ($maintenanceRequestsService) { // Sử dụng biến đúng
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
    
            if ($userId) {
                // Lấy tổng số yêu cầu sửa chữa
                $totalMaintenanceRequests = $maintenanceRequestsService->countTotalMaintenanceRequests();
                $view->with('totalMaintenanceRequests', $totalMaintenanceRequests);
            } else {
                $view->with('totalMaintenanceRequests', 0);
            }
        });
        View::composer('components.navbar-owner', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        View::composer('components.navbar-owner', function ($view) use ($notificationService) {
            $view->with('unreadNotificationCount', $notificationService->getUnreadNotificationCount());
        });
        View::composer('components.navbar-owner', function ($view) use ($roomOwnersService) {
            $view->with('unreadRoomCount', $roomOwnersService->getRoomCount());
        });
        View::composer('components.navbar-home', function ($view) use ($favouriteService) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            // Kiểm tra nếu người dùng đã đăng nhập
            if ($userId) {
                $favouriteCount = $favouriteService->countUserFavourites($userId);
                $view->with('favouriteCount', $favouriteCount);
            } else {
                $view->with('favouriteCount', 0);
            }
        });
        View::composer('components.navbar-default', function ($view) use ($favouriteService) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            // Kiểm tra nếu người dùng đã đăng nhập
            if ($userId) {
                $favouriteCount = $favouriteService->countUserFavourites($userId);
                $view->with('favouriteCount', $favouriteCount);
            } else {
                $view->with('favouriteCount', 0);
            }
        });
        View::composer('components.navbar-owner', function ($view) use ($favouriteService) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            // Kiểm tra nếu người dùng đã đăng nhập
            if ($userId) {
                $favouriteCount = $favouriteService->countUserFavourites($userId);
                $view->with('favouriteCount', $favouriteCount);
            } else {
                $view->with('favouriteCount', 0);
            }
        });
        View::composer('components.navbar-admin', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        View::composer('components.navbar-owner', function ($view) use ($blogServices) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            if ($userId) {
                // Lấy tổng số blog
                $totalBlogs = $blogServices->countTotalBlogs();
                $view->with('totalBlogs', $totalBlogs);
            } else {
                $view->with('totalBlogs', 0);
            }
        });
        // Trong ServiceProvider hoặc nơi bạn cấu hình View Composer
// Trong ServiceProvider hoặc nơi bạn cấu hình View Composer



       

    }
    protected $listen = [
        \App\Events\RoomCreated::class => [
            \App\Listeners\SendRoomCreatedNotification::class,
        ],
    ];
    
}
