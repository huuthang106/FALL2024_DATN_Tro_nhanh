<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\ZoneCreate; // Thay đổi theo tên sự kiện của bạn
use App\Listeners\SendZoneCreatedNotification; // Thay đổi theo tên listener của bạn
use App\Events\ZoneCreated;
class EventServiceProvider extends ServiceProvider
{
    /**
     * Các ánh xạ sự kiện và listener của ứng dụng.
     *
     * @var array
     */
    protected $listen = [
        ZoneCreated::class => [
            SendZoneCreatedNotification::class,
        ],
    ];

    /**
     * Đăng ký bất kỳ sự kiện nào cho ứng dụng của bạn.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
