<?php

namespace App\Services;

use App\Events\Owners\RoomOwnersEvent;
use Illuminate\Support\Facades\Log;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Category;
use App\Models\Price;
use App\Models\Location;
use App\Models\Zone;
use App\Models\Image;
use Cocur\Slugify\Slugify;
use Exception;
use Illuminate\Support\Facades\DB;

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
    //     try {
    //         // Tạo một phòng mới
    //         $room = new Room();
    //         $room->title = $request->input('title');
    //         $room->description = $request->input('description');
    //         $room->price = $request->input('price');
    //         $room->phone = $request->input('phone');
    //         $room->address = $request->input('address');
    //         $room->acreage = $request->input('acreage');
    //         $room->quantity = $request->input('quantity');
    //         $room->view = $request->input('view');
    //         $room->status = $request->input('status');
    //         $room->longitude = $request->input('longitude');
    //         $room->latitude = $request->input('latitude');
    //         $room->user_id = $request->input('user_id');
    //         $room->room_type_id = $request->input('room_type_id');
    //         $room->category_id = $request->input('category_id');
    //         $room->acreages_id = $request->input('acreages_id');
    //         $room->price_id = $request->input('price_id');
    //         $room->area_id = $request->input('area_id');
    //         $room->location_id = $request->input('location_id');
    //         $room->zone_id = $request->input('zone_id');

    //         if ($room->save()) {
    //             // Lấy ID của phòng mới tạo
    //             $roomId = $room->id;

    //             // Tạo slug từ tiêu đề và id
    //             $slug = $this->createSlug($request->input('title')) . '-' . $roomId;
    //             $room->slug = $slug;

    //             // Lưu lại phòng với slug
    //             if ($room->save()) {
    //                 // Xử lý tải hình ảnh
    //                 if ($request->hasFile('images')) {
    //                     // Xóa ảnh cũ nếu cần
    //                     // $oldImages = Image::where('room_id', $roomId)->get();
    //                     // foreach ($oldImages as $oldImage) {
    //                     //     $path = public_path('assets/images/' . $oldImage->filename);
    //                     //     if (file_exists($path)) {
    //                     //         unlink($path);
    //                     //     }
    //                     //     $oldImage->delete();
    //                     // }

    //                     $images = $request->file('images');
    //                     foreach ($images as $image) {
    //                         // Tạo tên file mới với timestamp
    //                         $timestamp = now()->format('YmdHis');
    //                         $originalName = $image->getClientOriginalName();
    //                         $extension = $image->getClientOriginalExtension();
    //                         $filename = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

    //                         // Lưu ảnh vào thư mục public/assets/images
    //                         $image->move(public_path('assets/images'), $filename);

    //                         // Lưu thông tin ảnh vào cơ sở dữ liệu
    //                         $imageModel = new Image();
    //                         $imageModel->room_id = $roomId;
    //                         $imageModel->filename = $filename;
    //                         $imageModel->save();
    //                     }
    //                 }
    //                 return $room;
    //             } else {
    //                 // Nếu không thể lưu slug, xóa phòng và dispatch sự kiện thất bại
    //                 $room->delete();
    //                 return false;
    //             }
    //         } else {
    //             return false;
    //         }
    //     } catch (Exception $e) {
    //         Log::error('Error creating room: ' . $e->getMessage());
    //         return false;
    //     }
    // }
    public function create($request)
    {
        try {
            // Tạo một phòng mới
            $room = new Room();
            $room->title = $request->input('title');
            $room->description = $request->input('description');
            $room->price = $request->input('price');
            $room->phone = $request->input('phone');
            $room->address = $request->input('address');
            $room->acreage = $request->input('acreage');
            $room->quantity = $request->input('quantity');
            $room->view = $request->input('view');
            $room->status = $request->input('status');
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

            // Lưu phòng và kiểm tra kết quả
            if ($room->save()) {
                // Lấy ID của phòng mới tạo
                $roomId = $room->id;

                // Tạo slug từ tiêu đề và id
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
        } catch (Exception $e) {
            Log::error('Error creating room: ' . $e->getMessage());
            return false;
        }
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
}
