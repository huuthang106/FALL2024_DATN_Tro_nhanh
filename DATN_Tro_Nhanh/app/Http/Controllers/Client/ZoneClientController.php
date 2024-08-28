<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoneServices;
use App\Http\Requests\ZoneRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\CommentClientService;

class ZoneClientController extends Controller
{
    //
    protected $zoneServices;
    //
    protected $CommentClientService;
    public function __construct(ZoneServices $zoneServices, CommentClientService $CommentClientService)
    {
        $this->zoneServices = $zoneServices;
        $this->CommentClientService = $CommentClientService;
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
        $zoneDetails = $this->CommentClientService->getZoneDetailsWithRatings($slug);

        $comments = $zoneDetails['comments'];

        $zones = $this->zoneServices->getZoneDetailsBySlug($slug); // Lấy thông tin chi tiết của khu vực trọ dựa trên slug

        return view('client.show.single-zone', [
            'zones' => $zoneDetails['zone'],
            'averageRating' => $zoneDetails['averageRating'],
            'ratingsDistribution' => $zoneDetails['ratingsDistribution'],
            'comments' => $comments,
        ]);
    }
}
