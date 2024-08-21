<?php

namespace App\Services;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Category;
use App\Models\Price;
use App\Models\Location;
use App\Models\Zone;
use App\Models\Image;
use Cocur\Slugify\Slugify;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoomOwnersService
{
    /**
     * Lấy danh sách phòng liên quan đến người dùng hiện tại.
     *
     * @param int|null $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    /**
     * Lấy danh sách phòng cho người dùng, sắp xếp từ mới đến cũ và phân trang.
     *
     * @param int $userId
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    const CON_TRONG = 1; // Còn trống
    const DA_THUE = 2; // Đã thuê
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
    public function getRoomImages($roomId)
    {
        return Image::where('room_id', $roomId)->get();
    }
    // Phương thức để lấy thông tin phòng theo ID
    public function getRoomById($id)
    {
        return Room::find($id);
    }
    public function create($request)
    {
        // Tạo một phòng mới
        if (auth()->check()) {
            $room = new Room();
            $user_id = auth()->id();
            $room->title = $request->input('title');
            $room->description = $request->input('description');
            $room->price = $request->input('price');
            $room->phone = $request->input('phone');
            $room->address = $request->input('address');
            $room->acreage = $request->input('acreage');
            $room->quantity = $request->input('quantity');
            $room->view = $request->input('view');
            $room->status = $request->input('status');
            $room->province = $request->input('province');
            $room->district = $request->input('district');
            $room->village = $request->input('village');
            $room->longitude = $request->input('longitude');
            $room->latitude = $request->input('latitude');
            $room->user_id = $user_id;
            $room->category_id = $request->input('category_id');
            $room->location_id = $request->input('location_id');
            $room->room_type_id = $request->input('room_type_id');
            $room->price_id = $request->input('price_id');
            $room->zone_id = $request->input('zone_id');
            // Lưu phòng và kiểm tra kết quả
            if (!$room->save()) {
                return false;
            }
            // Lấy ID của phòng mới tạo và tạo slug
            $roomId = $room->id;
            $slug = $this->createSlug($request->input('title')) . '-' . $roomId;
            $room->slug = $slug;
            // Lưu lại phòng với slug
            if (!$room->save()) {
                $room->delete();
                return false;
            }
            // Xử lý tải hình ảnh
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $uploadedFilenames = []; // Để lưu trữ các tên file đã được tải lên
                foreach ($images as $image) {
                    // Tạo tên file mới với timestamp
                    $timestamp = now()->format('YmdHis');
                    $originalName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $filename = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
                    // Kiểm tra xem ảnh đã tồn tại trong cơ sở dữ liệu chưa
                    if (!in_array($filename, $uploadedFilenames)) {
                        // Lưu ảnh vào thư mục public/assets/images
                        $image->move(public_path('assets/images'), $filename);
                        // Lưu thông tin ảnh vào cơ sở dữ liệu
                        $imageModel = new Image();
                        $imageModel->room_id = $roomId;
                        $imageModel->filename = $filename;
                        $imageModel->save();
                        // Thêm tên file vào danh sách đã tải lên
                        $uploadedFilenames[] = $filename;
                    }
                }
            }
            return $room;
        } else {
            return false;
        }
    }
    // Hiểm thị danh sách trọ của tài khoản
    public function getRooms($userId, $searchQuery = null, $sortBy = 'title')
    {
        $query = Room::where('user_id', $userId);
        // Lọc
        if (!empty($searchQuery)) {
            $query->where('title', 'like', '%' . $searchQuery . '%');
        }
        // Sắp xếp
        switch ($sortBy) {
            case 'price_low_to_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_to_low':
                $query->orderBy('price', 'desc');
                break;
            case 'date_old_to_new':
                $query->orderBy('created_at', 'asc');
                break;
            case 'date_new_to_old':
            default:
                $query->orderBy('created_at', 'desc'); // Mặc định mới đến cũ
                break;
        }
        // Phân trang
        return $query->paginate(10);
    }

    // Lấy hình ảnh
    public function getRoomImageUrl(Room $room): string
    {
        $image = $room->images->first();
        return $image ? asset('assets/images/' . $image->filename) : asset('assets/images/properties-grid-08.jpg');
    }
    // Tổng số trọ của tài khoản
    public function getRoomCount($userId = null)
    {
        // Nếu userId không có hoặc NULL sẽ auth()->id();
        $userId = $userId ?? auth()->id();
        return Room::where('user_id', $userId)->count();
    }
    // Hàm tạo Slug
    private function createSlug($name)
    {
        $slugify = new Slugify();
        $slug = $slugify->slugify($name);
        $existingCategory = Category::where('slug', $slug)->first();
        // Nếu slug đã tồn tại, thêm ID vào slug
        if ($existingCategory) {
            $slug = $slug . '-' . (Category::max('id') + 1);
        }
        return $slug;
    }
    // Chi Tiết phòng trọ
    public function getIdRoom($slug)
    {
        return Room::with('category', 'roomType', 'price', 'location', 'zone') // Thêm các quan hệ
            ->where('slug', $slug)
            ->firstOrFail();
    }
    // Cập nhật
    public function update($request, $roomId)
    {
        if (auth()->check()) {
            // Tìm phòng theo ID
            $room = Room::find($roomId);
            if (!$room) {
                return false; // Nếu phòng không tồn tại
            }

            // Cập nhật thông tin phòng
            $room->title = $request->input('title');
            $room->description = $request->input('description');
            $room->price = $request->input('price');
            $room->phone = $request->input('phone');
            $room->address = $request->input('address');
            $room->acreage = $request->input('acreage');
            $room->quantity = $request->input('quantity');
            $room->view = $request->input('view');
            $room->status = $request->input('status');
            $room->province = $request->input('province');
            $room->district = $request->input('district');
            $room->village = $request->input('village');
            $room->longitude = $request->input('longitude');
            $room->latitude = $request->input('latitude');
            $room->category_id = $request->input('category_id');
            $room->location_id = $request->input('location_id');
            $room->room_type_id = $request->input('room_type_id');
            $room->price_id = $request->input('price_id');
            $room->zone_id = $request->input('zone_id');
            // Tạo slug từ tiêu đề và ID phòng
            $slug = $this->createSlug($request->input('title')) . '-' . $roomId;
            $room->slug = $slug;
            // Lưu lại phòng với slug
            if (!$room->save()) {
                return false;
            }
            // Xử lý tải hình ảnh
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $uploadedFilenames = []; // Để lưu trữ các tên file đã được tải lên
                foreach ($images as $image) {
                    // Tạo tên file mới với timestamp
                    $timestamp = now()->format('YmdHis');
                    $originalName = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $filename = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
                    // Kiểm tra xem ảnh đã tồn tại trong cơ sở dữ liệu chưa
                    if (!in_array($filename, $uploadedFilenames)) {
                        // Lưu ảnh vào thư mục public/assets/images
                        $image->move(public_path('assets/images'), $filename);
                        // Lưu thông tin ảnh vào cơ sở dữ liệu
                        $imageModel = new Image();
                        $imageModel->room_id = $roomId;
                        $imageModel->filename = $filename;
                        $imageModel->save();
                        // Thêm tên file vào danh sách đã tải lên
                        $uploadedFilenames[] = $filename;
                    }
                }
            }
            return $room;
        } else {
            return false; // Nếu người dùng chưa đăng nhập, trả về false
        }
    }
}
