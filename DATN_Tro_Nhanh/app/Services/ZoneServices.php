<?php

namespace App\Services;

use App\Models\Zone;
use Illuminate\Support\Facades\Storage;
use App\Events\Admin\ZoneUpdated;
class ZoneServices
{
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
                    if ($request->hasFile('images')) {
                        foreach ($request->file('images') as $image) {
                            $this->storeImage($zone, $image);
                        }
                    }
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
    public function getMyZone($user_id){
        $perPage = 10;
        $zones = Zone::where('user_id', $user_id)->orderByDesc('created_at')->paginate($perPage);
        return $zones;
    }


    /**
     * Lưu ảnh
     * 
     * @param Zone $zone
     * @param \Illuminate\Http\UploadedFile $image
     * @return void
     */
    // protected function storeImage(Zone $zone, $image)
    // {
    //     $path = $image->store('zones', 'public');
    //     // Giả sử bạn có mối quan hệ với bảng ảnh
    //     $zone->images()->create(['path' => $path]);
    // }
    public function getAllZones()
    {
        return Zone::all();
    }
    public function findById($id)
    {
        return Zone::find($id);
    }

    // Phương thức để cập nhật khu trọ
    public function update($request, $id)
    {
        // Tìm khu trọ theo ID
        $zone = Zone::find($id);
        
        // Nếu khu trọ tồn tại, thực hiện cập nhật và kích hoạt sự kiện
        if ($zone) {
            $zone->update($request->all());

            // Kích hoạt sự kiện
            event(new ZoneUpdated($zone));
           
            return true;
        }

        // Trả về false nếu không tìm thấy khu trọ
        return false;
    }
    public function getIdZone($slug){
        $zone = Zone::where('slug', $slug)->first();
        return $zone;
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
    
}
