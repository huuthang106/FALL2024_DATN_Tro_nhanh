<?php

namespace App\Http\Controllers\Owners;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NotificationOwnersService;
use Illuminate\Support\Facades\Redirect;

class NotificationOwnersController extends Controller
{
    protected $notificationOwnersService;
    public function __construct(NotificationOwnersService $notificationOwnersService)
    {
        $this->notificationOwnersService = $notificationOwnersService;
    }
    public function index(Request $request)
    {
        // Lấy số lượng kết quả từ query param, mặc định là 10
        $perPage = $request->query('notification-list_length', 10);
        $query = $request->query('query', '');

        // Lọc và phân trang
        $notifications = $this->notificationOwnersService->getFilteredNotifications($query, $perPage);
        // phương thức kiểm tra user
        $notifications = $this->notificationOwnersService->getPaginatedNotifications($perPage);
        if ($request->ajax()) {
            return response()->json([
                'notifications' => $notifications->items(),
            ]);
        }

        return view('owners.show.notification', [
            'notifications' => $notifications,
            'query' => $query,
        ]);
    }
    public function search(Request $request)
    {
        $query = $request->query('query', '');

        // Lấy các thông báo dựa trên từ khóa tìm kiếm
        $notifications = $this->notificationOwnersService->searchNotifications($query);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.notifications', compact('notifications'))->render(),
            ]);
        }

        // Đối với yêu cầu không phải AJAX
        return view('owners.show.notification', compact('notifications', 'query'));
    }
    public function showDetails($slug)
    {
        // // Sử dụng service để cập nhật trạng thái và lấy thông tin room
        // $room = $this->notificationOwnersService->updateNotificationStatus($slug);

        // if (!$room) {
        //     return abort(404, 'Trang không tồn tại!');
        // }

        // // Chuyển hướng đến trang chi tiết của room
        // return redirect()->route('client.detail-room', ['slug' => $room->slug]);

        // Gọi phương thức service để xử lý
        $result = $this->notificationOwnersService->updateNotificationStatus($slug);

        if ($result['url']) {
            return Redirect::to($result['url']);
        } else {
            return Redirect::back()->with('info', $result['message']);
        }
    }
}
