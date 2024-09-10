<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ResidentService;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ResidentClientController extends Controller
{
    protected $residentService;
    public function storeResident(Request $request, ResidentService $residentService)
    {
        
            $data = $request->all();
       
        try {
            $tenant_id = Auth::user()->id;
            $resident = $residentService->storeResident($data, $tenant_id);
            return response()->json([
                'success' => true,
                'message' => 'Thông tin cư dân đã được lưu.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
        
    }
    
    
    

}
