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

    public function listZone(Request $request, $perPage = 10)
    {
        $searchTerm = $request->input('search');
        $province = $request->input('province');
        $district = $request->input('district');
        $village = $request->input('village');
        $category = $request->input('category'); // Thêm tham số category
        $features = $request->input('features');
        $type = $request->input('type');

        $zones = $this->zoneServices->getAllZones(
            (int) $perPage,
            $type,
            $searchTerm,
            $province,
            $district,
            $village,
            $category,
            $features
        );

        $locations = $this->zoneServices->getUniqueLocations();
        $popularZones = $this->zoneServices->getPopularZones();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'zones' => $zones,
                'searchTerm' => $searchTerm,
                'province' => $province,
                'district' => $district,
                'village' => $village,
                'provinces' => $locations['provinces'],
                'districts' => $locations['districts'],
                'villages' => $locations['villages'],
                'popularZones' => $popularZones
            ]);
        }

        $categories = $this->zoneServices->getCategories(); // Lấy danh sách categories

        return view('client.show.listing-grid-with-left-filter', [
            'zones' => $zones,
            'searchTerm' => $searchTerm,
            'province' => $province,
            'district' => $district,
            'village' => $village,
            'category' => $category, // Truyền category đã chọn vào view
            'type' => $type, // Truyền loại phòng sang view
            'provinces' => $locations['provinces'],
            'districts' => $locations['districts'],
            'villages' => $locations['villages'],
            'categories' => $categories, // Truyền danh sách categories vào view
            'popularZones' => $popularZones,
            'features' => $features
        ]);
    }
    public function listZoneClient(Request $request) 
    {
        $keyword = $request->input('keyword');
        $province = $request->input('province');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $category = $request->input('category');    
        if ($latitude && $longitude) {
            $zones = $this->zoneServices->searchZonesWithinRadius($latitude, $longitude, 30);
        } elseif ($keyword || $province) {
            $zones = $this->zoneServices->searchZones($keyword, $province, $category);
        } else {
            $userLat = session('userLat');
            $userLng = session('userLng');
    
            if ($userLat && $userLng) {
                $zones = $this->zoneServices->searchZonesWithinRadius($userLat, $userLng, 30);
            } else {
                $zones = $this->zoneServices->getMyZoneClient($category);
            }
        }
    
        $totalZones = $this->zoneServices->getTotalZones();
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
            'totalZones' => $totalZones,
            'keyword' => $keyword,
            'province' => $province,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'userLat' => $request->input('user_lat'),
            'userLng' => $request->input('user_lng'),
            'showLocationAlert' => true,
            'provinces' => $provinces, // Truyền danh sách các mã tỉnh vào view
            'zoneServices' => $this->zoneServices
        ]);
    }
    public function showZoneDetails($slug)
    {
        // Lấy thông tin zone dựa trên slug
        $zoneDetails = $this->CommentClientService->getZoneDetailsWithRatings($slug);
        $zone = $this->zoneServices->getZoneDetailsBySlug($slug);
    
        $user = $zone->user;
        $userId = auth()->id();
        // $identity = Identity::where('user_id', $userId)->first();
    
        $comments = $zoneDetails['comments']; // Giả sử bạn có mối quan hệ comments trong Zone
        $utilities = $zone->utilities; // Giả sử bạn có mối quan hệ utilities trong Zone
        $province = $zone->province;
        $locations = $this->zoneServices->getUniqueLocations();
        $categories = $this->zoneServices->getCategories();
    
        // Tăng lượt xem cho zone
        $this->zoneServices->incrementViewCount($zone->id);
    
        // Lấy các khu vực tương tự
        $similarZones = $this->zoneServices->getZoneClient($province, $zone->id);
    
        // Kiểm tra xem yêu cầu có phải là AJAX hay không
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'zone' => $zone,
                'averageRating' => $zoneDetails['averageRating'], // Giả sử bạn có phương thức này
                'ratingsDistribution' => $zoneDetails['ratingsDistribution'], // Giả sử bạn có phương thức này
                'user' => $user,
                'utilities' => $utilities,
                'similarZones' => $similarZones,
                'slug' => $slug
            ]);
        }
    
        // Nếu không phải là AJAX, trả về view
        return view('client.show.single-propety', [
            'categories' => $categories,
            'zone' => $zone,
            'averageRating' => $zoneDetails['averageRating'], // Giả sử bạn có phương thức này
            'ratingsDistribution' => $zoneDetails['ratingsDistribution'], // Giả sử bạn có phương thức này
            'comments' => $comments,
            'user' => $user,
            // 'identity' => $identity,
            'utilities' => $utilities,
            'similarZones' => $similarZones,
            'provinces' => $locations['provinces'],
            'province' => request()->input('province', '')
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
