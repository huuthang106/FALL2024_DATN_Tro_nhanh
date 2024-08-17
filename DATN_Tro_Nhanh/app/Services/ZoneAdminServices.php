<?php

namespace App\Services;

use App\Models\Zone;
use Illuminate\Support\Facades\Storage;

class ZoneAdminServices
{
    public function store($request)
    {
        try {
            $data = $request->only([
                'name', 'description', 'address', 'village', 'district', 'province', 'longitude', 'latitude', 'total_rooms', 'status'
            ]);

            $zone = Zone::create($data);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('zones', 'public');
                    $zone->images()->create(['path' => $path]);
                }
            }

            return true;
        } catch (\Exception $e) {
            // Xử lý lỗi nếu cần thiết
            return false;
        }
    }
}
