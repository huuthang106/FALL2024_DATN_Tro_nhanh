<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Acreage;

class AcreageAdminService
{
    public function showAcreage($perPage = 10)
    {
        $acreages = Acreage::orderBy('created_at', 'desc')->take(7)->paginate($perPage);
        return $acreages;
    }

    public function getAcreageById($id)
    {
        $acreages = Acreage::find($id);
        return $acreages;
    }

    public function created($request)
    {
        // Tạo mới đối tượng Acreage và gán giá trị
        $acreage = new Acreage();
        $acreage->name = $request->input('name');
        $acreage->min_size = $request->input('min_size');
        $acreage->max_size = $request->input('max_size');
        $acreage->status = $request->input('status');
        // Lưu đối tượng Acreage
        $acreage->save();
    }

    public function update($request, $id)
    {
        try {
            // Tìm đối tượng Acreage cần cập nhật
            $acreage = Acreage::find($id);

            if (!$acreage) {
                // Trả về false nếu không tìm thấy đối tượng
                return false;
            }

            // Cập nhật các thuộc tính từ request
            $acreage->name = $request->input('name');
            $acreage->min_size = $request->input('min_size');
            $acreage->max_size = $request->input('max_size');
            $acreage->status = $request->input('status');

            // Lưu đối tượng Acreage
            $acreage->save();

            // Trả về true nếu lưu thành công
            return true;
        } catch (\Exception $e) {
            // Ghi log lỗi nếu có lỗi xảy ra
            return false;
        }
    }
}
