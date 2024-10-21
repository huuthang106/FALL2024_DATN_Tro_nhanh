<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Location;

class LocationAdminService
{
    private const status = 1;
    public function showLocation($perPage = 10)
    {
        $locations = Location::paginate($perPage);
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
        $locations->type_vip = $request->input('type_vip');
        $locations->status = $request->input('status');
        // Lưu đối tượng locations
        if ($locations->save()) {
            // Lấy ID của đối tượng mới tạo
            $locationsId = $locations->id;
            // Tạo slug từ title và id
            $slug = $this->createSlug($request->input('name')) . '-' . $locationsId;

            // Cập nhật slug cho đối tượng
            $locations->slug = $slug;
            
            $locations->status = 1;
            // Lưu lại đối tượng với slug mới
            $locations->save();
        } else {
            return false;
        }
    }


    public function updateLocation($request, $id)
    {
        $locations = Location::findOrFail($id);
        $locations->name = $request->input('name');
        $locations->type_vip = $request->input('type_vip');
        $locations->status = $request->input('status');
        // Lưu đối tượng Location
        $locations->save();
    }

    public function softDeleteLocation($id)
    {
        // Tìm location theo ID
        $location = Location::findOrFail($id);

        // Tiến hành xóa mềm location
        $location->forceDelete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Đã được xóa thành công'
        ];
    }
    public function getTrashedLocations()
    {
        return Location::onlyTrashed()->get();
    }
    public function restoreLocation($id)
    {
        // Tìm location theo ID (bao gồm cả những cái đã xóa mềm)
        $location = Location::withTrashed()->findOrFail($id);

        // Khôi phục location
        $location->restore();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Location đã được khôi phục thành công.'
        ];
    }
    public function forceDeleteLocation($id)
    {
        // Tìm location theo ID (bao gồm cả những cái đã xóa mềm)
        $location = Location::withTrashed()->findOrFail($id);

        // Xóa vĩnh viễn location
        $location->forceDelete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Location đã được xóa vĩnh viễn thành công.'
        ];
    }
}
