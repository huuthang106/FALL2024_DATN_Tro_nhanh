<?php

namespace App\Services;

use App\Models\Utility;

class UtilitiesService
{
    public function createUtility(array $data)
    {
        return Utility::create($data);
    }

    public function getAllUtilities($perPage = 8)
    {
        return Utility::paginate($perPage); // Số lượng bản ghi trên mỗi trang
    }


    public function getUtilityById($id)
    {
        return Utility::findOrFail($id);
    }

    public function updateUtility($id, array $data)
    {
        $utility = Utility::findOrFail($id);
        $utility->update($data);
        return $utility;
    }
}
