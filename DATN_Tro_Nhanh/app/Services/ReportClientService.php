<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Report;
use App\Models\Zone;
use Illuminate\Support\Facades\Log;

class ReportClientService
{
    public function getRoomBySlug($slug)
    {
        return Room::where('slug', $slug)->firstOrFail();
    }
    public function getZoneBySlug($slug)
    {
        return Zone::where('slug', $slug)->firstOrFail();
    }
    public function createReportRoom($data)
    {
        return Report::create([
            'description' => $data['description'],
            'status' => $data['status'],
            'user_id' => auth()->id(),
            'room_id' => $data['room_id'],
            'reported_person' => $data['reported_person'],
        ]);
    }
    public function createReportZone($data)
    {
        return Report::create([
            'description' => $data['description'],
            'status' => $data['status'],
            'user_id' => auth()->id(),
            'zone_id' => $data['zone_id'],
            'reported_person' => $data['reported_person'],
        ]);
    }
}
