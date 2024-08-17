<?php

namespace App\Listeners\Admin;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Events\Admin\CategoryAdminEvent;

class HandleCategoryAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CategoryAdminEvent $event)
    {
        // Nhận đối tượng Category từ sự kiện
        $category = $event->category;
        // Ghi thông tin category vào log
        Log::info('Category created:', [
            'id' => $category->id,
            'name' => $category->name,
            'status' => $category->status,
        ]);
    }
}
