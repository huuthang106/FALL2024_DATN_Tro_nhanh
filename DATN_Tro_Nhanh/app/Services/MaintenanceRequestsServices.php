<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\MaintenanceRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\BlogCreated;
use Illuminate\Support\Facades\DB;

class MaintenanceRequestsServices
{
    public function getAllMaintenanceRequests($roomId = null)
    {
        $query = MaintenanceRequest::query();
    
        // Nếu có roomId, lọc theo roomId
        if ($roomId) {
            $query->where('room_id', $roomId);
        }
    
   
        $maintenanceRequests = $query->paginate(8); 
    
        return $maintenanceRequests;
    }
    
    
}

 

