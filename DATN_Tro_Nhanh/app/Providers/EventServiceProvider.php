<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;
use App\Events\ZoneCreated;
use App\Listeners\SendZoneCreatedNotification;
use App\Events\Admin\CategoryAdminEvent;
use App\Listeners\Admin\HandleCategoryAdmin;
use App\Events\BlogCreated;
use App\Listeners\SendBlogCreatedNotification;

class EventServiceProvider extends BaseEventServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ZoneCreated::class => [
            SendZoneCreatedNotification::class,
        ],
        CategoryAdminEvent::class => [
            HandleCategoryAdmin::class,
        ],
        BlogCreated::class => [
            SendBlogCreatedNotification::class,
        ],
        // RoomOwnersEvent::class => [
        //     HandleRoomOwner::class,
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function register(): void
    {
        // Các dịch vụ hoặc ràng buộc vào container dịch vụ của Laravel
    }

    /**
     * Bootstrap any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        // Đăng ký sự kiện hoặc thực hiện các hành động khác khi ứng dụng khởi động
    }
}
