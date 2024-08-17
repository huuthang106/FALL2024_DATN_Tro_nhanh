<?php

namespace App\Services;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Category;
use App\Models\Price;
use App\Models\Location;
use App\Models\Zone;
use App\Models\Image;

class RoomOwnersService
{
    public function getAllCategories()
    {
        return Category::all();
    }
    public function getAllRoomTypes()
    {
        return RoomType::all();
    }
    public function getAllPrices()
    {
        return Price::all();
    }
    public function getAllLocations()
    {
        return Location::all();
    }
    public function getAllZones()
    {
        return Zone::all();
    }
    // public function create($request)
    // {
    //     // Tạo một phòng mới
    //     $room = new Room();
    //     $room->title = $request->input('title');
    //     $room->description = $request->input('description');
    //     $room->price = $request->input('price');
    //     $room->phone = $request->input('phone');
    //     $room->address = $request->input('address');
    //     $room->quantity = $request->input('quantity');
    //     $room->view = $request->input('view');
    //     $room->longitude = $request->input('longitude');
    //     $room->latitude = $request->input('latitude');
    //     $room->user_id = $request->input('user_id');
    //     $room->room_type_id = $request->input('room_type_id');
    //     $room->category_id = $request->input('category_id');
    //     $room->acreages_id = $request->input('acreages_id');
    //     $room->price_id = $request->input('price_id');
    //     $room->area_id = $request->input('area_id');
    //     $room->location_id = $request->input('location_id');
    //     $room->zone_id = $request->input('zone_id');

    //     if ($room->save()) {
    //         // Lấy ID của phòng mới tạo
    //         $roomId = $room->id;

    //         // Tạo slug từ tiêu đề và id
    //         $slug = $this->createSlug($request->input('title')) . '-' . $roomId;

    //         // Cập nhật slug cho phòng
    //         $room->slug = $slug;

    //         if ($room->save()) {
    //             // Xử lý tải hình ảnh
    //             if ($request->hasFile('images')) {
    //                 $images = $request->file('images');
    //                 foreach ($images as $image) {
    //                     // Tạo tên file mới với timestamp
    //                     $timestamp = now()->format('YmdHis');
    //                     $originalName = $image->getClientOriginalName();
    //                     $extension = $image->getClientOriginalExtension();
    //                     $filename = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

    //                     // Lưu ảnh vào thư mục public/assets/images
    //                     $image->move(public_path('assets/images'), $filename);

    //                     // Lưu thông tin ảnh vào cơ sở dữ liệu
    //                     $imageModel = new Image();
    //                     $imageModel->room_id = $roomId;
    //                     $imageModel->filename = $filename;
    //                     $imageModel->save();
    //                 }
    //             }

    //             return $room;
    //         } else {
    //             // Nếu không thể lưu slug, xóa phòng
    //             $room->delete();
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }
    public function create($request)
    {
        // Tạo một phòng mới
        $room = new Room();
        $room->title = $request->input('title');
        $room->description = $request->input('description');
        $room->price = $request->input('price');
        $room->phone = $request->input('phone');
        $room->address = $request->input('address');
        $room->quantity = $request->input('quantity');
        $room->view = $request->input('view');
        $room->longitude = $request->input('longitude');
        $room->latitude = $request->input('latitude');
        $room->user_id = $request->input('user_id');
        $room->room_type_id = $request->input('room_type_id');
        $room->category_id = $request->input('category_id');
        $room->acreages_id = $request->input('acreages_id');
        $room->price_id = $request->input('price_id');
        $room->area_id = $request->input('area_id');
        $room->location_id = $request->input('location_id');
        $room->zone_id = $request->input('zone_id');

        if ($room->save()) {
            // Lấy ID của phòng mới tạo
            $roomId = $room->id;

            // Tạo slug từ tiêu đề và id
            $slug = $this->createSlug($request->input('title')) . '-' . $roomId;
            $room->slug = $slug;

            if ($room->save()) {
                // Xử lý tải hình ảnh
                if ($request->hasFile('images')) {
                    $images = $request->file('images');
                    foreach ($images as $image) {
                        // Tạo tên file mới với timestamp
                        $timestamp = now()->format('YmdHis');
                        $originalName = $image->getClientOriginalName();
                        $extension = $image->getClientOriginalExtension();
                        $filename = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

                        // Lưu ảnh vào thư mục public/assets/images
                        $image->move(public_path('assets/images'), $filename);

                        // Lưu thông tin ảnh vào cơ sở dữ liệu
                        $imageModel = new Image();
                        $imageModel->room_id = $roomId;
                        $imageModel->filename = $filename;
                        $imageModel->save();
                    }
                }

                return $room;
            } else {
                // Nếu không thể lưu slug, xóa phòng
                $room->delete();
                return false;
            }
        } else {
            return false;
        }
    }

    private function createSlug($title)
    {
        // Xử lý để tạo slug từ tên
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));
        $existingRoom = Room::where('slug', $slug)->first();

        // Nếu slug đã tồn tại, thêm ID vào slug
        if ($existingRoom) {
            $slug = $slug . '-' . (Room::max('id') + 1);
        }

        return $slug;
    }
}
