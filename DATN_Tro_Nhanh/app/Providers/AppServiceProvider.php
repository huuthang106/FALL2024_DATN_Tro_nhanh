<?php

namespace App\Providers;

use App\Services\BlogServices;
use App\Services\ZoneServices;
use App\Services\CartService;
use Illuminate\Support\ServiceProvider;
use App\Services\NotificationOwnersService;
use App\Services\RoomOwnersService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Services\FavouritesServices;
use App\Services\UserClientServices;
use App\Services\CommentClientService;
use App\Services\WatchListOwner;
// use App\Services\RoomOwnersService;
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
    public function boot(UserClientServices $userClientServices,NotificationOwnersService $notificationService,WatchListOwner $watchListService,CommentClientService $commentClientService,ZoneServices $zoneServices, BlogServices $blogServices, RoomOwnersService $roomOwnersService, FavouritesServices $favouriteService, MaintenanceRequestsServices $maintenanceRequestsService, CartService $cartService)
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
        View::composer('components.navbar-home', function ($view) use ($cartService) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại

            // Kiểm tra nếu người dùng đã đăng nhập
            if ($userId) {
                $cartCount = $cartService->getCoutCart($userId);
                $view->with('cartCount', $cartCount);
            } else {
                $view->with('cartCount', 0);
            }
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
        View::composer('components.navbar-default', function ($view) use ($cartService) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại

            // Kiểm tra nếu người dùng đã đăng nhập
            if ($userId) {
                $cartCount = $cartService->getCoutCart($userId);
                $view->with('cartCount', $cartCount);
            } else {
                $view->with('cartCount', 0);
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
        View::composer('components.navbar-owner', function ($view) {
            $userId = Auth::id(); // Get the ID of the currently authenticated user
            
            // Get an instance of FavouriteService
            $favouriteService = app(FavouritesServices::class);

            // Check if the user is authenticated
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
        View::composer('owners.show.dashboard', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        View::composer('admincp.show.overview', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        View::composer('components.navbar-owner', function ($view) use ($blogServices) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại

            if ($userId) {
                // Lấy tổng số blog của người dùng hiện tại
                $totalBlogs = $blogServices->countTotalBlogs($userId);
                $view->with('totalBlogs', $totalBlogs);
            } else {
                // Nếu không có userId, truyền giá trị 0
                $view->with('totalBlogs', 0);
            }
        });
        
        View::composer('components.navbar-owner', function ($view) use ($zoneServices) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            if ($userId) {
                // Gọi hàm countTotalZones từ service để đếm tổng số zones
                $totalZones = $zoneServices->countTotalZones();
        
                // Truyền số lượng zones vào view
                $view->with('totalZones', $totalZones);
            } else {
                // Nếu không có userId, truyền giá trị 0
                $view->with('totalZones', 0);
            }
        });
        View::composer('owners.show.dashboard', function ($view) use ($zoneServices) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            if ($userId) {
                // Gọi hàm getTotalZonesByUser từ service để đếm tổng số zones
                $totalZones = $zoneServices->getTotalZonesByUser($userId);
        
                // Truyền số lượng zones vào view
                $view->with('totalZones', $totalZones);
            } else {
                // Nếu không có userId, truyền giá trị 0
                $view->with('totalZones', 0);
            }
        });
        View::composer('owners.show.dashboard', function ($view) use ($commentClientService) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            if ($userId) {
                // Gọi hàm countTotalReviews từ service để đếm tổng số lượng đánh giá
                $totalReviews = $commentClientService->countTotalReviews();
        
                // Truyền tổng số lượng đánh giá vào view
                $view->with('totalReviews', $totalReviews);
            } else {
                // Nếu không có userId, truyền giá trị 0
                $view->with('totalReviews', 0);
            }
        });
        View::composer('owners.show.dashboard', function ($view) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại

            if ($userId) {
                // Gọi hàm getRoomCount từ service để đếm tổng số lượng phòng
                $roomCount = app(RoomOwnersService::class)->getRoomCount($userId);

                // Truyền tổng số lượng phòng vào view
                $view->with('roomCount', $roomCount);
            } else {
                // Nếu không có userId, truyền giá trị 0
                $view->with('roomCount', 0); // Truyền 0 nếu không có người dùng đăng nhập
            }
        });
        View::composer('owners.show.dashboard', function ($view) use ($watchListService) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại

            if ($userId) {
                // Gọi hàm getTotalWatchListsByUser từ service để đếm tổng số lượng watchlists
                $totalWatchLists = $watchListService->getTotalWatchListsByUser($userId);

                // Truyền số lượng watchlists vào view
                $view->with('totalWatchLists', $totalWatchLists);
            } else {
                // Nếu không có userId, truyền giá trị 0
                $view->with('totalWatchLists', 0); // Truyền 0 nếu không có người dùng đăng nhập
            }
        });
        View::composer('owners.show.dashboard', function ($view) use ($userClientServices) {
            $userId = Auth::id(); // Lấy ID người dùng hiện tại
        
            if ($userId) {
           
                $balance = $userClientServices->getUserBalanceForAppProvider();
        
                // Chuyển đổi balance thành string nếu cần thiết
                $view->with('balance', (string)$balance); // Truyền số dư vào view
            } else {
                // Nếu không có userId, truyền giá trị 0
                $view->with('balance', '0'); // Truyền '0' nếu không có người dùng đăng nhập
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
