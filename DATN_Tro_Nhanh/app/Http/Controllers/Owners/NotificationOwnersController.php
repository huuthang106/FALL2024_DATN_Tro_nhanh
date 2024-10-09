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
        $query = $request->query('query', '');
        $perPage = $request->query('notification-list_length', 10); // Default to 10 if not provided
        $this->notificationOwnersService->updateNotificationStatusByPage(); // Gọi hàm để cập nhật trạng
        // Retrieve paginated notifications based on the search query and perPage value
        $notifications = $this->notificationOwnersService->searchNotifications($query, $perPage);

    
        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.notifications', compact('notifications'))->render(),
            ]);
        }
    
        return view('owners.show.notification', [
            'notifications' => $notifications,
            'query' => $query,
        ]);
    }
    
    public function search(Request $request)
    {
        // $query = $request->query('query', '');

        // // Lấy các thông báo dựa trên từ khóa tìm kiếm
        // $notifications = $this->notificationOwnersService->searchNotifications($query);

        // if ($request->ajax()) {
        //     return response()->json([
        //         'html' => view('partials.notifications', compact('notifications'))->render(),
        //     ]);
        // }

        // // Đối với yêu cầu không phải AJAX
        // return view('owners.show.notification', compact('notifications', 'query'));
        $query = $request->query('query', '');

        // Lấy các thông báo dựa trên từ khóa tìm kiếm
        $notifications = $this->notificationOwnersService->searchNotifications($query);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('partials.notifications', compact('notifications'))->render(),
            ]);
        }

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
