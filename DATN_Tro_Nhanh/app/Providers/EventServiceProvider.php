<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ZoneCreate; // Thay đổi theo tên sự kiện của bạn
use App\Listeners\SendZoneCreatedNotification; // Thay đổi theo tên listener của bạn
use App\Events\ZoneCreated;
use App\Events\Admin\CategoryAdminEvent;
use App\Listeners\Admin\HandleCategoryAdmin;
// use Illuminate\Support\ServiceProvider;
// use App\Events\Owners\RoomOwnersEvent;

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
