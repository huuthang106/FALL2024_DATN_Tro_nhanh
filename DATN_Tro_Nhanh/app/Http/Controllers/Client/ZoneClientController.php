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


            Log::info('1');
        } elseif ($keyword || $province) {
            $zones = $this->zoneServices->searchZones($keyword, $province);
            Log::info('2');
        } else {
            // Lấy vị trí hiện tại của người dùng nếu không có từ khóa hoặc tỉnh/thành phố
            if ($request->has('user_lat') && $request->has('user_lng')) {
                $userLat = $request->input('user_lat');
                $userLng = $request->input('user_lng');
                $zones = $this->zoneServices->searchZonesWithinRadius($userLat, $userLng, 30);
                Log::info('3');
            } else {
                // Nếu không có vị trí người dùng, lấy danh sách khu trọ Client
                $zones = $this->zoneServices->getMyZoneClient();
                Log::info('hi');
            }
        }

        $totalZones = $this->zoneServices->getTotalZones(); // Tổng khu trọ CLient

        if ($request->ajax()) {
            return response()->json([
                'zones' => $zones->items(),
                'totalZones' => $totalZones,
                'pagination' => (string) $zones->links() // Thêm phần này để trả về pagination links
            ]);
        }

        return view('client.show.listing-half-map-list-layout-1', [
            'zones' => $zones,
            'totalZones' => $totalZones,
            'keyword' => $keyword, // Truyền keyword vào view
            'province' => $province, // Truyền province vào view
            'latitude' => $latitude, // Truyền latitude vào view
            'longitude' => $longitude, // Truyền longitude vào view
            'userLat' => $request->input('user_lat'), // Truyền user_lat vào view
            'userLng' => $request->input('user_lng') // Truyền user_lng vào view
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
    
}
