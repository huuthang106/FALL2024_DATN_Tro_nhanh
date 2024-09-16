<?php

namespace App\Services;

use App\Models\Room;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class RoomServices
{
   public function getAllRooms(int $perPage = 10)
   {
       try {
           return Room::paginate($perPage);
       } catch (\Exception $e) {
           Log::error('Không thể lấy danh sách phòng: ' . $e->getMessage());
           return null;
       }
   }

   
   }



