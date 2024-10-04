<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseEventServiceProvider;
use App\Events\Admin\ZoneCreated as AdminZoneCreated;
use App\Events\ZoneCreated;
use App\Listeners\SendZoneCreatedNotification;
use App\Listeners\SendRoomCreatedNotification;
use App\Events\RoomCreated;
use App\Events\Admin\ZoneUpdated;
use App\Listeners\SendZoneUpdatedNotification;
use App\Events\Admin\CategoryAdminEvent;
use App\Listeners\Admin\HandleCategoryAdmin;
use App\Events\BlogCreated;
use App\Listeners\SendBlogCreatedNotification;
use App\Events\Owners\RoomOwnersEvent;
use App\Listeners\Owners\HandleRoomOwner;
use App\Events\Owners\PaymentProcessed;
use App\Listeners\Owners\ProcessPayment;
use App\Events\ExpiredEntitiesUpdateEvent;
use App\Listeners\UpdateExpiredPremiumUsersListener;
use App\Listeners\CheckAndUpdateExpiredRoomsListener;
use App\Listeners\HandleExpiredLocksListener;
use App\Events\ServiceMailsSummaryEvent;
use App\Listeners\SendServiceMailsSummaryListener;
use App\Events\PasswordResetRequestEvent;
use App\Listeners\SendPasswordResetLinkListener;

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
        ZoneUpdated::class => [
            SendZoneUpdatedNotification::class,
        ],
        CategoryAdminEvent::class => [
            HandleCategoryAdmin::class,
        ],
        ExpiredEntitiesUpdateEvent::class => [
            UpdateExpiredPremiumUsersListener::class,
            CheckAndUpdateExpiredRoomsListener::class,
            HandleExpiredLocksListener::class,
        ],

        BlogCreated::class => [
            SendBlogCreatedNotification::class,
        ],
        CategoryAdminEvent::class => [
            HandleCategoryAdmin::class,
        ],
        RoomCreated::class => [
            SendRoomCreatedNotification::class,
        ],
        RoomOwnersEvent::class => [
            HandleRoomOwner::class,
        ],
        PaymentProcessed::class => [
            ProcessPayment::class,
        ],
        ServiceMailsSummaryEvent::class => [
            SendServiceMailsSummaryListener::class,
        ],
        PasswordResetRequestEvent::class => [
            SendPasswordResetLinkListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {

        parent::boot(); // Đăng ký sự kiện hoặc thực hiện các hành động khác khi ứng dụng khởi động
    }
}
