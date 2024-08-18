<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Room;
use App\Models\Category;
use App\Models\Acreage;
use App\Models\Location;
use App\Models\Zone;
use App\Models\User;
use App\Models\RoomType;
use App\Models\Image;

class RoomAdminService
{
    public function showRoomWhere()
    {
        $rooms = Room::orderBy('created_at', 'desc')->take(7)->get();
        return $rooms;
    }
    public function getRoom()
    {
        $rooms = Room::with(['category', 'acreage', 'location', 'zone', 'user', 'room_type'])->get();
        $categories = Category::all();
        $locations = Location::all();
        $acreages = Acreage::all();
        $zones = Zone::all();
        $users = User::all();
        $roomTypes = RoomType::all();
        return compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users', 'roomTypes');
    }
    // Them tro 
    public function create($request)
    {
        // Tạo mới đối tượng Room và gán giá trị
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
        $room->acreages_id = $request->input('acreages_id');
        $room->location_id = $request->input('location_id');
        $room->zone_id = $request->input('zone_id');
        $room->room_type_id = $request->input('room_type_id');
        $room->category_id = $request->input('category_id');
        $room->user_id = 1;
        // Lưu đối tượng Room
        if ($room->save()) {
            // Lấy ID của đối tượng mới tạo
            $roomId = $room->id;
            // Tạo slug từ title và id
            $slug = $this->createSlug($request->input('title')) . '-' . $roomId;

            // Cập nhật slug cho đối tượng
            $room->slug = $slug;

            // Lưu lại đối tượng với slug mới
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