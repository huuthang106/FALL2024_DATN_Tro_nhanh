<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Pagination\LengthAwarePaginator;

class NotificationOwnersService
{
    const CHUA_XEM = 1; // Chưa xem
    const DA_XEM = 2; // Đã xem
    protected $roomService;

    public function __construct(RoomClientServices $roomService)
    {
        $this->roomService = $roomService;
    }
    // Cập nhật status
    public function updateNotificationStatus($slug)
    {
        // Tìm thông báo dựa trên slug của blog, zone, hoặc room
        $notification = Notification::whereHas('blog', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->orWhereHas('zone', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->orWhereHas('room', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->first();

        if (!$notification) {
            return ['url' => null, 'message' => 'Thông báo không tồn tại.'];
        }

        // Cập nhật trạng thái thông báo
        $notification->status = self::DA_XEM;
        $notification->save();

        // Xác định URL điều hướng dựa trên loại thông báo
        if ($notification->blog) {
            return ['url' => route('client.client-blog-detail', ['slug' => $notification->blog->slug]), 'message' => null];
        } elseif ($notification->zone) {
            return ['url' => route('owners.zone-list', ['slug' => $notification->zone->slug]), 'message' => null];
        } elseif ($notification->room) {
            return ['url' => route('client.detail-room', ['slug' => $notification->room->slug]), 'message' => null];
        } else {
            return ['url' => null, 'message' => 'Thông báo không liên kết với bất kỳ dữ liệu nào.'];
        }




        // % trường khóa ngoại
        // // Tìm thông báo dựa trên slug của blog, zone, room, comment, hoặc watchlist
        // $notification = Notification::whereHas('blog', function ($query) use ($slug) {
        //     $query->where('slug', $slug);
        // })->orWhereHas('zone', function ($query) use ($slug) {
        //     $query->where('slug', $slug);
        // })->orWhereHas('room', function ($query) use ($slug) {
        //     $query->where('slug', $slug);
        // })->orWhereHas('comment', function ($query) use ($slug) {
        //     $query->where('slug', $slug);
        // })->orWhereHas('watchlist', function ($query) use ($slug) {
        //     $query->where('slug', $slug);
        // })->first();

        // if (!$notification) {
        //     return ['url' => null, 'message' => 'Thông báo không tồn tại.'];
        // }

        // // Cập nhật trạng thái thông báo
        // $notification->status = self::STATUS_VIEWED;
        // $notification->save();

        // // Xác định URL điều hướng dựa trên loại thông báo
        // if ($notification->blog) {
        //     return ['url' => route('client.client-blog-detail', ['slug' => $notification->blog->slug]), 'message' => null];
        // } elseif ($notification->zone) {
        //     return ['url' => route('owners.zone-list'), 'message' => null];
        // } elseif ($notification->room) {
        //     return ['url' => route('client.detail-room', ['slug' => $notification->room->slug]), 'message' => null];
        // } elseif ($notification->comment) {
        //     return ['url' => route('client.detail-room'), 'message' => null];
        // } elseif ($notification->watchlist) {
        //     return ['url' => route('owners.favorites'), 'message' => null];
        // } else {
        //     return ['url' => null, 'message' => 'Thông báo không liên kết với bất kỳ dữ liệu nào.'];
        // }
    }
    // Lấy thông báo tài khoản
    public function getPaginatedNotifications($perPage = 10)
    {
        // // Lấy ID của người dùng hiện tại
        $userId = auth()->id();

        return Notification::where('user_id', $userId) // Lọc thông báo theo người dùng hiện tại
            ->with('room') // Eager load relationship với phòng
            ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo từ mới nhất đến cũ nhất
            ->paginate($perPage); // Phân trang
        // $userId = auth()->id();

        // $notifications = Notification::where('user_id', $userId)
        //     ->with('room')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate($perPage);

        // Debug dữ liệu để kiểm tra
        // dd($notifications);
        // return $notifications;
    }
    // Lấy số thông báo trên chuông của tài khoản
    public function getUnreadNotificationCount()
    {
        // Lấy ID của người dùng hiện tại
        $userId = auth()->id();

        // Đếm số lượng thông báo chưa đọc (status = 1)
        return Notification::where('user_id', $userId)
            ->where('status', self::CHUA_XEM) // Chỉ lấy các thông báo chưa đọc
            ->count();
    }

    public function updateNotificationStatusByPage($perPage = 10)
    {
    $userId = auth()->id();
    
    // Lấy số trang từ URL hoặc mặc định là trang 1
    $page = request()->get('page', 1);

    // Lấy thông báo của người dùng, sắp xếp mới nhất lên đầu và phân trang
    $notifications = Notification::where('user_id', $userId)
        ->where('status', self::CHUA_XEM)
        ->orderBy('created_at', 'desc') // Sắp xếp từ mới đến cũ
        ->paginate($perPage, ['*'], 'page', $page); // Phân trang

    // Lấy danh sách id các thông báo trong trang hiện tại
    $notificationIds = $notifications->pluck('id');

    // Cập nhật trạng thái của những thông báo đó thành DA_XEM
    Notification::whereIn('id', $notificationIds)
        ->update(['status' => self::DA_XEM]);
    }




    // Tìm kiếm
    public function searchNotifications($query, $perPage = 10)
    {
        return Notification::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('data', 'like', "%{$query}%")
                ->orWhere('type', 'like', "%{$query}%")
                ->orWhere('status', 'like', "%{$query}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);
    }
    
    // Lọc
    public function getFilteredNotifications(string $query = '', int $perPage = 10): LengthAwarePaginator
    {
        return $this->searchNotifications($query)->paginate($perPage);
        
    }
}
