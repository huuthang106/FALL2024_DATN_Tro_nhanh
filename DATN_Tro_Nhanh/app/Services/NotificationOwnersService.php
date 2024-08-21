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
    // Tìm kiếm
    public function searchNotifications($query)
    {
        return Notification::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('data', 'like', "%{$query}%")
                ->orWhere('type', 'like', "%{$query}%")
                ->orWhere('status', 'like', "%{$query}%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    // Lọc
    public function getFilteredNotifications(string $query = '', int $perPage = 10): LengthAwarePaginator
    {
        return Notification::where('data', 'like', "%{$query}%")
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }
}
