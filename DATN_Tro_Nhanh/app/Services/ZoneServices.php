<?php

namespace App\Services;

use App\Models\Zone;
use App\Models\Resident;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;
use App\Events\Admin\ZoneUpdated;
use App\Models\Utility;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Events\BillCreated;

class ZoneServices
{
    const CO = 1; // Có tiện ích
    const CHUA_CO = 2; // Chưa có tiện ích
    const DA_TAO = 1; // Trạng thái tạo hóa đơn
    public function getRoomUtilities($zoneId)
    {
        // Giả sử bạn đã có model `Utility`
        return Utility::where('zone_id', $zoneId)->first();
    }
    public function store($request)
    {
        if (auth()->check()) {
            $zone = new Zone();
            $user_id = auth()->id();
            $zone->name = $request->input('name');
            $zone->description = $request->input('description');
            $zone->total_rooms = $request->input('total_rooms');

            $zone->address = $request->input('address');
            $zone->province = $request->input('province');
            $zone->district = $request->input('district');
            $zone->village = $request->input('village');
            $zone->latitude = $request->input('latitude');
            $zone->longitude = $request->input('longitude');
            $zone->status = $request->input('status');
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
                    // Xử lý ảnh nếu có
                    // if ($request->hasFile('images')) {
                    //     foreach ($request->file('images') as $image) {
                    //         $this->storeImage($zone, $image);
                    //     }
                    // }
                    if ($request->hasFile('images')) {
                        foreach ($request->file('images') as $image) {
                            if ($image->isValid() && in_array($image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                                if ($image->getSize() <= 5242880) { // 5MB
                                    $this->storeImage($zone, $image);
                                }
                            }
                        }
                    }
                    $utilities = new Utility();
                    $utilities->zone_id = $zoneId;

                    // Kiểm tra tiện ích từ request
                    $utilities->wifi = $request->has('wifi') ? self::CO : self::CHUA_CO;
                    $utilities->air_conditioning = $request->has('air_conditioning') ? self::CO : self::CHUA_CO;
                    $utilities->garage = $request->has('garage') ? self::CO : self::CHUA_CO;

                    // Xử lý số lượng phòng tắm
                    $utilities->bathrooms = $request->input('bathrooms', 0); // Số lượng phòng tắm

                    // Lưu thông tin tiện ích
                    $utilities->save();
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
        $slug = preg_replace('/[^a-z0-9]+/i', '-', trim($string));
        $slug = strtolower($slug);
        $slug = trim($slug, '-');
        return $slug;
    }
    public function getMyZone($user_id)
    {
        $perPage = 10;
        $zones = Zone::where('user_id', $user_id)->orderByDesc('created_at')->paginate($perPage);
        return $zones;
    }
    // Danh sách khu vực trọ Client
    // public function getMyZoneClient()
    // {
    //     $perPage = 5;
    //     $zones = Zone::orderByDesc('created_at')->paginate($perPage); // sắp xếp
    //     return $zones;
    // }
    public function getMyZoneClient()
    {
        $perPage = 5;
        $zones = Zone::with('utility')->orderByDesc('created_at')->paginate($perPage);
        return $zones;
    }
    // Tổng só khu trọ Client
    public function countRoomsInZone($zone_id)
    {
        // Đếm số phòng trong zone_id cụ thể
        return Room::where('zone_id', $zone_id)->count();
    }
    public function getTotalZonesByUser($userId = null)
    {
        try {
            // Use the provided userId or fall back to the currently authenticated user
            $userId = $userId ?? Auth::id();

            // Count the number of zones for the specified user
            return Zone::where('user_id', $userId)->count();
        } catch (\Exception $e) {
            // Log the error and return 0 in case of any issues
            Log::error('Error counting zones: ' . $e->getMessage());
            return 0;
        }
    }
    // Xem chi tiết khu trọ CLient theo Slug
    public function getZoneDetailsBySlug($slug)
    {
        // Tìm khu vực trọ dựa trên slug
        return Zone::where('slug', $slug)->firstOrFail();
    }
    /**
     * Lưu ảnh
     * 
     * @param Zone $zone
     * @param \Illuminate\Http\UploadedFile $image
     * @return void
     */
    protected function storeImage(Zone $zone, $image)
    {
        // $path = $image->store('zones', 'public');
        // // Giả sử bạn có mối quan hệ với bảng ảnh
        // $zone->images()->create(['path' => $path]);
        // Tạo tên file mới với timestamp
        $timestamp = now()->format('YmdHis');
        $originalName = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $filename = $timestamp . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;

        // Lưu ảnh vào thư mục public/assets/images với tên mới
        $path = 'assets/images/' . $filename;
        $image->move(public_path('assets/images'), $filename);

        // Tạo bản ghi mới trong bảng images
        $zone->images()->create([
            'filename' => $filename,
            'path' => $path
        ]);
    }
    public function getAllZones(int $perPage = 10, $searchTerm = null)
    {
        try {
            $query = Zone::query();

            if ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            }

            // Sắp xếp theo ngày tạo mới nhất
            $query->orderBy('created_at', 'desc');

            return $query->paginate($perPage);
        } catch (\Exception $e) {
            return null;
        }
    }
    // Chi tiết khu trọ
    public function showDetail($slug, $status)
    {
        // Tìm zone dựa trên slug
        $zone = Zone::where('slug', $slug)->firstOrFail();

        // Lấy danh sách phòng thuộc zone này
        $rooms = Room::where('zone_id', $zone->id)->paginate(10);

        // Lấy danh sách người ở (residents) thuộc zone này
        $residents = Resident::whereIn('room_id', $rooms->pluck('id'))
            ->where('zone_id', $zone->id)
            ->where('status', $status) // Chỉ lấy resident có status = 2
            ->with('user') // Nạp thông tin người dùng liên quan
            ->paginate(10);

        return [
            'zone' => $zone,
            'rooms' => $rooms,
            'residents' => $residents,

        ];
    }
    // Xóa mềm Residents
    public function softDeleteResident($residentId)
    {
        $resident = Resident::findOrFail($residentId);
        $resident->delete();
        return $resident;
    }
    // Tạo Hóa Đơn Khu Trọ Bills
    public function createBill($data)
    {
        // dd($data); 
        $data['status'] = self::DA_TAO;
        $data['payment_date'] = now();

        // Kiểm tra và thêm hạn thanh toán nếu có
        if (isset($data['payment_due_date'])) {
            $data['payment_due_date'] = $data['payment_due_date']; // Giữ nguyên giá trị từ form
        } else {
            $data['payment_due_date'] = now(); // Nếu không có, mặc định là hiện tại
        }

        $bill = Bill::create($data);
        event(new BillCreated($bill, $data['payer_id']));
        return $bill;
    }


    public function findById($id)
    {
        return Zone::find($id);
    }

    // Phương thức để cập nhật khu trọ
    // public function update($request, $id)
    // {
    //     // Tìm khu trọ theo ID
    //     $zone = Zone::find($id);

    //     // Nếu khu trọ tồn tại, thực hiện cập nhật và kích hoạt sự kiện
    //     if ($zone) {
    //         $zone->update($request->all());

    //         // Kích hoạt sự kiện
    //         event(new ZoneUpdated($zone));

    //         return true;
    //     }

    //     // Trả về false nếu không tìm thấy khu trọ
    //     return false;
    // }
    public function getIdZone($slug)
    {
        $zone = Zone::where('slug', $slug)->first();
        return $zone;
    }
    public function countTotalZones()
    {
        try {
            // Đếm tổng số bản ghi trong bảng zones
            return Zone::count(); // Chỉnh sửa tên lớp từ `zones` thành `Zone` (nếu `Zone` là tên mô hình của bạn)
        } catch (\Exception $e) {
            // Ghi log lỗi nếu có ngoại lệ
            Log::error('Error counting zones: ' . $e->getMessage());
            // Trả về 0 nếu có lỗi
            return 0;
        }
    }



    public function update($request, $zoneId)
    {
        if (auth()->check()) {
            // Tìm đối tượng Zone theo ID
            $zone = Zone::find($zoneId);

            if (!$zone) {
                return false; // Nếu không tìm thấy, trả về false
            }

            // Cập nhật thông tin đối tượng
            $zone->name = $request->input('name');
            $zone->description = $request->input('description');
            $zone->total_rooms = $request->input('total_rooms');
            $zone->address = $request->input('address');
            $zone->province = $request->input('province');
            $zone->district = $request->input('district');
            $zone->village = $request->input('village');
            $zone->latitude = $request->input('latitude');
            $zone->longitude = $request->input('longitude');
            $zone->status = $request->input('status');
            $zone->user_id = auth()->id(); // Cập nhật user_id từ thông tin đăng nhập

            // Xử lý cập nhật hình ảnh
            if ($request->hasFile('images')) {
                // Xóa ảnh cũ
                foreach ($zone->images as $oldImage) {
                    $oldImagePath = public_path('assets/images/' . $oldImage->filename);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $oldImage->delete();
                }

                // Thêm ảnh mới
                foreach ($request->file('images') as $image) {
                    $this->storeImage($zone, $image);
                }
            }

            // Lưu thông tin đã cập nhật vào cơ sở dữ liệu
            if ($zone->save()) {
                // Tạo slug từ name và id
                $slug = $this->createSlug($request->input('name')) . '-' . $zone->id;

                // Cập nhật slug cho đối tượng
                $zone->slug = $slug;

                // Lưu lại đối tượng với slug mới
                if ($zone->save()) {

                    return $zone;
                } else {
                    return false; // Nếu không thể lưu slug, trả về false
                }
            } else {
                return false; // Nếu không thể lưu thông tin cập nhật, trả về false
            }
        } else {
            return false; // Nếu người dùng chưa đăng nhập, trả về false
        }
    }






    public function softDeleteZones($id)
    {
        // Tìm zone theo ID
        $zone = Zone::findOrFail($id);

        // Kiểm tra xem có phòng nào thuộc zone này chưa bị xóa mềm hay không
        $activeRooms = Room::where('zone_id', $id)->whereNull('deleted_at')->exists();

        if ($activeRooms) {
            // Nếu có phòng đang hoạt động, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Khu trọ đang có phòng hoạt động, không thể xóa.'
            ];
        }

        // Kiểm tra xem có user_id nào đang ở trong resident thuộc zone này không
        $activeResidents = Resident::where('zone_id', $id)
            ->whereNotNull('user_id')
            ->exists();

        if ($activeResidents) {
            // Nếu có user_id đang ở trong resident, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Khu trọ đang có người ở, không thể xóa.'
            ];
        }

        // Nếu tất cả các phòng đều đã bị xóa mềm và không có người ở, tiến hành xóa mềm zone
        $zone->delete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Khu trọ đã được xóa thành công.'
        ];
    }



    public function getTrashedZones()
    {
        $userId = Auth::id(); // Lấy ID của người dùng đang đăng nhập

        return Zone::onlyTrashed()
            ->where('user_id', $userId) // Lọc theo user_id
            ->orderBy('created_at', 'desc') // Sắp xếp từ mới nhất đến cũ nhất
            ->get();
    }

    public function getProvinces()
    {
        return Zone::select('province')->distinct()->get();
    }


    public function restoreZones($id)
    {
        $zone = Zone::withTrashed()->findOrFail($id);
        $zone->restore();
        return $zone;
    }
    public function forceDeleteZones($id)
    {
        // Tìm zone theo ID kể cả khi đã bị xóa mềm
        $zone = Zone::withTrashed()->findOrFail($id);

        // Kiểm tra xem có phòng nào thuộc zone này chưa bị xóa mềm hay không
        $activeRooms = Room::where('zone_id', $id)->whereNull('deleted_at')->exists();

        if ($activeRooms) {
            // Nếu có phòng đang hoạt động, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Khu trọ đang có phòng hoạt động, không thể xóa vĩnh viễn.'
            ];
        }

        // Kiểm tra xem có user_id nào đang ở trong resident thuộc zone này không
        $activeResidents = Resident::where('zone_id', $id)
            ->whereNotNull('user_id')
            ->exists();

        if ($activeResidents) {
            // Nếu có user_id đang ở trong resident, trả về thông báo lỗi
            return [
                'status' => 'error',
                'message' => 'Khu trọ đang có người ở, không thể xóa vĩnh viễn.'
            ];
        }

        // Nếu tất cả các phòng đều đã bị xóa mềm và không có người ở, tiến hành xóa vĩnh viễn zone
        $zone->forceDelete();

        // Trả về thông báo thành công
        return [
            'status' => 'success',
            'message' => 'Khu trọ đã được xóa vĩnh viễn thành công.'
        ];
    }
    public function searchZones($keyword, $province)
    {
        $query = Zone::query();

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('address', 'like', '%' . $keyword . '%');
            });
        }

        if ($province) {
            $query->where('province', $province);
        }

        return $query->paginate(10); // Trả về đối tượng Paginator
    }
    public function searchZonesWithinRadius($latitude = null, $longitude = null, $radius = 30, $perPage = 10)
    {
        $query = Zone::with('utilities');

        if ($latitude && $longitude) {
            $haversine = "(6371 * acos(cos(radians($latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(latitude))))";
            $query->select('*')
                ->selectRaw("{$haversine} AS distance")
                ->having('distance', '<', $radius)
                ->orderBy('distance');
        } else {
            $query->orderByDesc('created_at');
        }

        return $query->paginate($perPage);
    }
    public function deleteZone($id)
    {
        // Tìm zone theo id hoặc trả về lỗi nếu không tìm thấy
        $zone = Zone::findOrFail($id);

        // Xóa zone
        $zone->delete();
    }
}
