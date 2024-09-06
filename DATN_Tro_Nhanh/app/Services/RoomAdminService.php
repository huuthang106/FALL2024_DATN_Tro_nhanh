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
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\Utility;
use App\Models\Resident;

class RoomAdminService
{
    // Tao bien hien thi phong con trong
    private const AvailableRooms = 1;

    const CO = 1; // Có tiện ích
    const CHUA_CO = 2; // Chưa có tiện ích
    public function showRoomWhere(int $perPage = 5, $searchTerm = null)
    {
        try {
            $user_id = Auth::user()->id;
            // Bắt đầu với query tìm tất cả các phòng, sắp xếp theo ngày tạo
            $query = Room::where('user_id', $user_id)->orderBy('created_at', 'desc');

            // Nếu có điều kiện tìm kiếm, thêm điều kiện vào query
            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            }

            // Giới hạn kết quả trả về là 7, và phân trang với số lượng trang được chỉ định
            return $query->paginate($perPage);
        } catch (\Exception $e) {
            // Xử lý ngoại lệ nếu có
            return null;
        }
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
        $room->user_id = auth()->id();
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
                $utilities = new Utility();
                $utilities->room_id = $roomId;

                // Kiểm tra tiện ích từ request
                $utilities->wifi = $request->has('wifi') ? self::CO : self::CHUA_CO;
                $utilities->air_conditioning = $request->has('air_conditioning') ? self::CO : self::CHUA_CO;
                $utilities->garage = $request->has('garage') ? self::CO : self::CHUA_CO;

                // Xử lý số lượng phòng tắm
                $utilities->bathrooms = $request->input('bathrooms', 0); // Số lượng phòng tắm
                $utilities->save();
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

    public function getRoomUtilities($roomId)
    {
        // Giả sử bạn đã có model `Utility`
        return Utility::where('room_id', $roomId)->first();
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

        // Lấy thông tin tiện ích hiện tại
        $utilities = Utility::where('room_id', $room->id)->first();

        if ($utilities) {
            // Cập nhật thông tin tiện ích
            $utilities->wifi = $request->has('wifi') ? self::CO : self::CHUA_CO;
            $utilities->air_conditioning = $request->has('air_conditioning') ? self::CO : self::CHUA_CO;
            $utilities->garage = $request->has('garage') ? self::CO : self::CHUA_CO;
            $utilities->bathrooms = $request->input('bathrooms', 0); // Số lượng phòng tắm
            $utilities->save();
        } else {
            // Nếu không có tiện ích, tạo mới
            $utilities = new Utility();
            $utilities->room_id = $room->id;
            $utilities->wifi = $request->has('wifi') ? self::CO : self::CHUA_CO;
            $utilities->air_conditioning = $request->has('air_conditioning') ? self::CO : self::CHUA_CO;
            $utilities->garage = $request->has('garage') ? self::CO : self::CHUA_CO;
            $utilities->bathrooms = $request->input('bathrooms', 0); // Số lượng phòng tắm
            $utilities->save();
        }

        // Cập nhật slug nếu title thay đổi
        $newSlug = $this->createSlug($request->input('title')) . '-' . $room->id;
        $room->slug = $newSlug;

        // Lưu đối tượng Room
        if ($room->save()) {
            // Xử lý tải hình ảnh
            if ($request->hasFile('images')) {
                // Lấy tất cả các ảnh cũ liên quan đến room này từ cơ sở dữ liệu
                $oldImages = Image::where('room_id', $room->id)->get();

                // Xóa ảnh cũ khỏi thư mục và cơ sở dữ liệu
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('assets/images/' . $oldImage->filename);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Xóa file khỏi thư mục
                    }
                    $oldImage->delete(); // Xóa bản ghi ảnh trong cơ sở dữ liệu
                }

                // Lưu ảnh mới vào thư mục và cơ sở dữ liệu
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

    public function softDeleteRoom($id)
    {
        // Tìm phòng theo ID
        $room = Room::findOrFail($id);

        // Kiểm tra xem room_id có trong bảng residents hay không
        $hasResidents = Resident::where('room_id', $id)->exists();

        if ($hasResidents) {
            // Nếu phòng có người ở, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Phòng có người ở, không thể xóa.'
            ];
        }

        // Nếu không có người ở, tiến hành xóa mềm
        $room->delete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Phòng đã được chuyển vào thùng rác thành công.'
        ];
    }



    public function getTrashedRooms()
    {
        return Room::onlyTrashed()->get();
    }

    public function restoreRoom($id)
    {
        $room = Room::withTrashed()->findOrFail($id);
        $room->restore();
        return $room;
    }

    public function forceDeleteRoom($id)
    {
        $room = Room::withTrashed()->findOrFail($id);
        $room->forceDelete();
        return $room;
    }

}