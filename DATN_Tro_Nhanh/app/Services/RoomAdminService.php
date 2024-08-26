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

use App\Models\Image;

class RoomAdminService
{
    // Tao bien hien thi phong con trong
    private const AvailableRooms = 1;
    public function showRoomWhere()
    {
        $rooms = Room::orderBy('created_at', 'desc')->take(7)->get();
        return $rooms;
    }

    public function showRoomStatus(int $perPage = 10, $searchTerm = null)
    {
        try {
            // Bắt đầu với query tìm tất cả các phòng có status = AvailableRooms
            $query = Room::where('status', self::AvailableRooms);

            // Nếu có điều kiện tìm kiếm, thêm điều kiện vào query
            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            }

            // Phân trang kết quả cuối cùng
            return $query->paginate($perPage);
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu có
            return null;
        }
    }


    public function getSlugRoom($slug)
    {
        $rooms = Room::with(['category', 'acreage', 'location', 'zone', 'user', 'images'])
            ->where('Slug', $slug)
            ->first();
        // Lấy tất cả dữ liệu liên quan
        $categories = Category::all();
        $locations = Location::all();
        $acreages = Acreage::all();
        $zones = Zone::all();
        $users = User::all();

        return compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users');
    }
    public function getRoom()
    {
        $rooms = Room::with(['category', 'acreage', 'location', 'zone', 'user'])->get();
        $categories = Category::all();
        $locations = Location::all();
        $acreages = Acreage::all();
        $zones = Zone::all();
        $users = User::all();

        return compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users');
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
        $room->province = $request->input('province');
        $room->district = $request->input('district');
        $room->village = $request->input('village');
        $room->longitude = $request->input('longitude');
        $room->latitude = $request->input('latitude');
        $room->acreage = $request->input('acreage');
        $room->location_id = $request->input('location_id');
        $room->zone_id = $request->input('zone_id');
        // $room->room_type_id = $request->input('room_type_id');
        $room->category_id = $request->input('category_id');
        $room->user_id = 2;
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

    public function update($request, $slug)
    {
        // Tìm đối tượng Room dựa trên slug
        $room = Room::where('slug', $slug)->first();
        // Cập nhật các thuộc tính của Room
        $room->title = $request->input('title');
        $room->description = $request->input('description');
        $room->price = $request->input('price');
        $room->phone = $request->input('phone');
        $room->address = $request->input('address');
        $room->quantity = $request->input('quantity');
        $room->view = $request->input('view');
        $room->province = $request->input('province');
        $room->district = $request->input('district');
        $room->village = $request->input('village');
        $room->longitude = $request->input('longitude');
        $room->latitude = $request->input('latitude');
        $room->acreage = $request->input('acreage');
        $room->location_id = $request->input('location_id');
        $room->zone_id = $request->input('zone_id');
        // $room->room_type_id = $request->input('room_type_id');
        $room->category_id = $request->input('category_id');

        // Cập nhật slug nếu title thay đổi
        $newSlug = $this->createSlug($request->input('title')) . '-' . $room->id;
        $room->slug = $newSlug;

        // Lưu đối tượng Room
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
                    $imageModel->room_id = $room->id;
                    $imageModel->filename = $filename;
                    $imageModel->save();
                }
            }

            return $room;
        } else {
            return false;
        }
    }

}