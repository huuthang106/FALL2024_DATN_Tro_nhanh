<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Location;

class LocationAdminService
{
    private const status = 1;
    public function showLocation()
    {
        $locations = Location::where('status', self::status)->get();
        return $locations;
    }

    public function getLocationBySlug($slug)
    {
        $locations = Location::where('Slug', $slug)->first();
        return $locations;
    }

    private function createSlug($name)
    {
        // Xử lý để tạo slug từ tên
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
        $existingLocation = Location::where('slug', $slug)->first();

        // Nếu slug đã tồn tại, thêm ID vào slug
        if ($existingLocation) {
            $slug = $slug . '-' . (Location::max('id') + 1);
        }

        return $slug;
    }

    public function createLocation($request)
    {
        // Tạo mới đối tượng Location và gán giá trị
        $locations = new Location();
        $locations->name = $request->input('name');
        $locations->end_date = $request->input('end_date');
        $locations->status = $request->input('status');
        // Lưu đối tượng locations
        if ($locations->save()) {
            // Lấy ID của đối tượng mới tạo
            $locationsId = $locations->id;
            // Tạo slug từ title và id
            $slug = $this->createSlug($request->input('name')) . '-' . $locationsId;

            // Cập nhật slug cho đối tượng
            $locations->slug = $slug;

            // Lưu lại đối tượng với slug mới
            $locations->save();
        } else {
            return false;
        }
    }


    public function updateLocation($request, $slug)
    {
        $locations = Location::where('slug', $slug)->first();
        $locations->name = $request->input('name');
        $locations->end_date = $request->input('end_date');
        $locations->status = $request->input('status');
        // Lưu đối tượng Location
        $locations->save();
    }
}