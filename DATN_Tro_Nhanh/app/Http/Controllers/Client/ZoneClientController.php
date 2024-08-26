<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoneServices;
use App\Http\Requests\ZoneRequest;
use Illuminate\Support\Facades\Auth;

class ZoneClientController extends Controller
{
    //
    protected $zoneServices;
    //

    public function __construct(ZoneServices $zoneServices)
    {
        $this->zoneServices = $zoneServices;
    }
    // Danh sách khu trọ 
    public function listZoneClient(Request $request)
    {
        $zones = $this->zoneServices->getMyZoneClient(); // Danh sách khu trọ Client
        $totalZones = $this->zoneServices->getTotalZones(); // Tổng khu trọ CLient
        return view('client.show.listing-half-map-list-layout-1', [
            'zones' => $zones,
            'totalZones' => $totalZones
        ]);
    }
    // Xem chi tiết
    public function showZoneDetailsBySlug($slug)
    {
        $zones = $this->zoneServices->getZoneDetailsBySlug($slug); // Lấy thông tin chi tiết của khu vực trọ dựa trên slug

        return view('client.show.single-zone', ['zones' => $zones]);
    }
}
