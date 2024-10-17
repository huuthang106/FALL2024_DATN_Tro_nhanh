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

    public function listZoneClient(Request $request, $perPage = 10)
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
