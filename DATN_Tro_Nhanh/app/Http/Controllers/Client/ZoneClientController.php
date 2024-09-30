<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ZoneServices;
use App\Http\Requests\ZoneRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\CommentClientService;
use Illuminate\Support\Facades\Log;

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

    public function listZoneClient(Request $request)
    {
        $keyword = $request->input('keyword');
        $province = $request->input('province');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        if ($latitude && $longitude) {
            $zones = $this->zoneServices->searchZonesWithinRadius($latitude, $longitude, 30);
        } elseif ($keyword || $province) {
            $zones = $this->zoneServices->searchZones($keyword, $province);
        } else {
            $userLat = session('userLat');
            $userLng = session('userLng');

            if ($userLat && $userLng) {
                $zones = $this->zoneServices->searchZonesWithinRadius($userLat, $userLng, 30);
            } else {
                $zones = $this->zoneServices->getMyZoneClient();
            }
        }

        // $totalZones = $this->zoneServices->getTotalZones();
        $provinces = $this->zoneServices->getProvinces()->pluck('province')->toArray(); // Chuyển đổi Collection thành mảng

        if ($request->ajax()) {
            return response()->json([
                'zones' => $zones->items(),
                'totalZones' => $totalZones,
                'pagination' => (string) $zones->links()
            ]);
        }
        return view('client.show.listing-half-map-list-layout-1', [
            'zones' => $zones,
            // 'totalZones' => $totalZones,
            'keyword' => $keyword,
            'province' => $province,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'userLat' => $request->input('user_lat'),
            'userLng' => $request->input('user_lng'),
            'showLocationAlert' => true,
            'provinces' => $provinces,
            'zoneServices' => $this->zoneServices // Truyền danh sách các mã tỉnh vào view
        ]);
    }
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
    public function saveLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Lưu vị trí vào session
        session(['userLat' => $request->latitude, 'userLng' => $request->longitude]);

        return response()->json(['success' => true]);
    }
}
