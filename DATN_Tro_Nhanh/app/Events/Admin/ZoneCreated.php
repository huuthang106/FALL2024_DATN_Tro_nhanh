<?php

namespace App\Events\Admin;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Zone;

class ZoneCreated
{
    use Dispatchable, SerializesModels;

    public $zone;

    public function __construct(Zone $zone)
    {
        $this->zone = $zone;
    }
}
