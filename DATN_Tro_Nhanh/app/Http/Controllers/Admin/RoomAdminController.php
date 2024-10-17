<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RoomAdminService;
use App\Services\ZoneServices;
use App\Http\Requests\CreateRoomRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Events\RoomCreated;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Services\CategoryAdminService;
use App\Services\IndexAdminService;

class RoomAdminController extends Controller
{
    //
    protected $roomAdminService;
    protected $categoryAdminService;
    protected $indexAdminService;
    protected $indexZoneServices;
    public function __construct(ZoneServices $zoneAdminServices,RoomAdminService $roomAdminService, CategoryAdminService $categoryAdminService, IndexAdminService $indexAdminService)
    {
        $this->roomAdminService = $roomAdminService;
        $this->categoryAdminService = $categoryAdminService;
        $this->indexAdminService = $indexAdminService;
        $this->indexZoneServices = $zoneAdminServices;
    }   
    public function index()
    {
        // $roomsCountByCategoryType = $this->categoryAdminService->getRoomsCountByCategoryType();
        // Lấy người dùng mới
        $recentUsers = $this->indexAdminService->getRecentUsers();
        // // Lấy các gói được mua nhiều
        $topPackages = $this->indexAdminService->getTopPackages();
        // // Lấy thống kê doanh thu theo tháng
        // $monthlyRevenue = $this->indexAdminService->getMonthlyRevenue();    
        // // Lấy người đưa tin được đánh giá cao
        // $topRatedPosters = $this->indexAdminService->getTopRatedPosters();
        // // Lấy 4 báo cáo 
        // $latestReports = $this->indexAdminService->getLatestReports();
        // // Lấy danh sách loại phòng
        // $roomsCountByCategoryType = $this->indexAdminService->getRoomsCountByCategoryType();
        // // Lấy tổng số phòng
        // $totalRooms = $this->indexAdminService->getTotalRooms();
        // // Lấy tổng số loại phòng
        $totalCategories = $this->indexAdminService->getTotalCategories();
        // $topCategories = $this->indexAdminService->getTopCategories();
        // // Lấy tổng số lượng mua gói trong năm và so sánh giữa các tháng
        $packageStatistics = $this->indexAdminService->getPackagePurchaseStatistics();
        // return view('admincp.show.index', compact('roomsCountByCategoryType', 'recentUsers', 'topPackages', 'monthlyRevenue', 'topRatedPosters', 'latestReports', 'roomsCountByCategoryType', 'totalRooms', 'totalCategories', 'topCategories', 'packageStatistics'));
        return view('admincp.show.index', compact('totalCategories','packageStatistics','recentUsers','topPackages'));
    }
    public function getDashboardStats(IndexAdminService $indexAdminService)
    {
        return response()->json([
            'recentUsers' => $indexAdminService->getRecentUsers(),
            'topPackages' => $indexAdminService->getTopPackages(),
            'monthlyRevenue' => $indexAdminService->getMonthlyRevenue(),
            'topRatedPosters' => $indexAdminService->getTopRatedPosters(),
            'latestReports' => $indexAdminService->getLatestReports(),
        ]);
    }
    public function destroy($id)
{
    $result = $this->roomAdminService->softDeleteRoom($id);

    if ($result['status'] === 'error') {
        // Nếu có người ở, quay lại trang hiện tại với thông báo lỗi
        return redirect()->back()->with('error', $result['message']);
    }

    // Nếu xóa thành công, quay lại trang trước đó với thông báo thành công
    return redirect()->back()->with('success', $result['message']);
}


    public function trash()
    {
        $trashedRooms = $this->roomAdminService->getTrashedRooms();
        return view('admincp.trash.trash-room', compact('trashedRooms'));
    }

    public function restore($id)
    {
        $this->roomAdminService->restoreRoom($id);
        return redirect()->route('admin.room-available-all')->with('success', 'Phòng đã được khôi phục.');
    }

    public function forceDelete($id)
    {
        $this->roomAdminService->forceDeleteRoom($id);
        return redirect()->route('admin.trash-room')->with('success', 'Phòng đã được xóa vĩnh viễn.');
    }

    public function show_room()
    {
        $rooms = $this->roomAdminService->showRoomWhere();
        return view('admincp.show.showRoom', ['rooms' => $rooms]);
    }

    public function show_room_all()
    {
        $rooms = $this->roomAdminService->showRoomAll();
        return view('admincp.show.showAll-room', ['rooms' => $rooms]);
    }
    public function add_room_show()
    {
        $data = $this->roomAdminService->getRoom();
        $rooms = $data['rooms'];
        $categories = $data['categories'];
        $acreages = $data['acreages'];
        $locations = $data['locations'];
        $zones = $data['zones'];
        $users = $data['users'];
        $userStatus = $data['userStatus'];
        return view('admincp.create.addRoom', compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users', 'userStatus'));
    }
    public function add_room_test(CreateRoomRequest $request)
    {
        if ($request->isMethod('post')) {
            $room = $this->roomAdminService->create($request);
            if ($room) {
                event(new RoomCreated($room));

                // Redirect với thông báo thành công
                return redirect()->route('admin.show-room')->with('success', 'Room đã được tạo thành công.');
            } else {
                // Handle the case where room creation failed
                return redirect()->route('admin.add-room-show')->with('error', 'Đã xảy ra lỗi khi tạo Room.');
            }
        }
        // Return a proper view if the request method is not POST
        return view('admincp.show.showRoom');
    }
    public function add_room(Request $request)
    {
        if ($request->isMethod('post')) {
            $room = $this->roomAdminService->create($request);
            if ($room) {
                event(new RoomCreated($room));

                // Redirect với thông báo thành công
                return redirect()->route('admin.show-room')->with('success', 'Room đã được tạo thành công.');
            } else {
                // Handle the case where room creation failed
                return redirect()->route('admin.show-room')->with('error', 'Đã xảy ra lỗi khi tạo Room.');
            }
        }
        // Return a proper view if the request method is not POST
        return view('admincp.show.showRoom');
    }
    public function update_room_show($slug)
    {
        $data = $this->roomAdminService->getSlugRoom($slug);
        $rooms = $data['rooms'];
        $utilities = $this->roomAdminService->getRoomUtilities($rooms->id); // Lấy tiện ích của phòng
        $categories = $data['categories'];
        $acreages = $data['acreages'];
        $locations = $data['locations'];
        $zones = $data['zones'];
        $users = $data['users'];

        return view('admincp.edit.updateRoom', compact('rooms', 'acreages', 'categories', 'locations', 'zones', 'users', 'utilities'));
    }
    public function update_room(CreateRoomRequest $request, $id)
    {
        $result = $this->roomAdminService->update($request, $id);

        if ($result) {
            // Cập nhật thành công, chuyển hướng hoặc thông báo
            return redirect()->route('admin.show-room')->with('success', 'Cập nhật phòng thành công.');
        } else {
            // Cập nhật thất bại, chuyển hướng hoặc thông báo lỗi
            return back()->with('error', 'Cập nhật phòng thất bại.');
        }
    }
    public function getroom()
    {
        // Lấy danh sách phòng với status = 1
        $zones = $this->indexZoneServices->getRoomsWithStatus(1);
 
        if ($zones === null || empty($zones)) {
            return response()->json(['message' => 'Không thể lấy danh sách phòng.'], 500);
        }
 
        return view('admincp.show.showAcceptRoom', compact('zones'));
    }
    public function approveRoom(string $id)
    {
        // Cập nhật status phòng thành giá trị 1
        $updatedRoom = $this->roomAdminService->updateRoomStatus($id, 2);

        if ($updatedRoom === null) {
            return redirect()->back()->withErrors('Không thể cập nhật status phòng.');
        }

        return redirect()->back()->with('success', 'Cập nhật status phòng thành công.');
    }
}
