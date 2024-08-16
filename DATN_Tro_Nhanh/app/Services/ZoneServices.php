<?php

namespace App\Services;

use App\Models\Zone;

class ZoneServices
{

    public function store($request)
    {
        if (auth()->check()) {
            $zone = new Zone();
            $user_id = auth()->id();

            // Gán các giá trị từ request vào các thuộc tính tương ứng
            $zone->name = $request->input('name');
            $zone->description = $request->input('description');
            $zone->total_rooms = $request->input('total_rooms');
            $zone->address = $request->input('address');
            $zone->province = $request->input('province');
            $zone->district = $request->input('district');
            $zone->village = $request->input('village');
            $zone->latitude = $request->input('latitude');
            $zone->longitude = $request->input('longitude');
            $zone->user_id = $user_id;

            // Lưu đối tượng vào cơ sở dữ liệu
            if ($zone->save()) {
                // Lấy ID của đối tượng mới tạo
                $zoneId = $zone->id;

                // Tạo slug từ title và id
                $slug = $this->createSlug($request->input('name')) . '-' . $zoneId;

                // Cập nhật slug cho đối tượng
                $zone->slug = $slug;

                // Lưu lại đối tượng với slug mới
                if ($zone->save()) {
                    return $zone; 
                } else {
                    // Nếu không thể lưu slug, xóa đối tượng vừa thêm
                    $zone->delete();
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Tạo slug từ một chuỗi văn bản
     * 
     * @param string $string
     * @return string
     */
    protected function createSlug($string)
    {
        // Loại bỏ dấu và chuyển thành chữ thường
        $slug = preg_replace('/[^a-z0-9]+/i', '-', trim($string));
        $slug = strtolower($slug);

        // Loại bỏ các dấu gạch ngang dư thừa
        $slug = trim($slug, '-');

        return $slug;
    }
}
