<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\Acreage;

class AcreageAdminService
{
    public function showAcreage()
    {
        $acreages = Acreage::orderBy('created_at', 'desc')->take(7)->get();
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
        $acreage = Acreage::where('id', $id)->first();
        $acreage->name = $request->input('name');
        $acreage->min_size = $request->input('min_size');
        $acreage->max_size = $request->input('max_size');
        $acreage->status = $request->input('status');
        // Lưu đối tượng Acreage
        $acreage->save();
    }
}