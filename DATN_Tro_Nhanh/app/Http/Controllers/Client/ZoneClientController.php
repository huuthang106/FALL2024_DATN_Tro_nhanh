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
            // Lấy vị trí hiện tại của người dùng từ session
            $userLat = session('userLat');
            $userLng = session('userLng');
    
            if ($userLat && $userLng) {
                // Nếu có vị trí trong session, tìm kiếm khu trọ trong bán kính 30 km
                $zones = $this->zoneServices->searchZonesWithinRadius($userLat, $userLng, 30);
                Log::info('3 - Lấy dữ liệu từ session: ' . $userLat . ', ' . $userLng);
            } else {
                // Nếu không có vị trí người dùng trong session, lấy danh sách khu trọ Client
                $zones = $this->zoneServices->getMyZoneClient();
                Log::info('hi - Không có vị trí người dùng');
                // Lấy kinh độ và vĩ độ từ session
                $userLat = session('userLat', null); // Lấy từ session, nếu không có thì null
                $userLng = session('userLng', null); // Lấy từ session, nếu không có thì null
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
