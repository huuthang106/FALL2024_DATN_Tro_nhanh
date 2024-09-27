<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use App\Models\CartDetail;
use App\Models\Comment;
use App\Models\Report;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndexAdminService
{
    const User = 1;
    const Owner = 2;
    const Chua_Duyet = 1;
    // Lấy người dùng mới đăng ký
    public function getRecentUsers($limit = 5)
    {
        return User::select('id', 'name', 'email', 'created_at', 'image')
            ->where('role', self::User)
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at,
                    'time_ago' => $this->getTimeAgo($user->created_at),
                    'image' => $user->image,
                    'slug' => $user->slug,
                ];
            });
    }
    // tạo thời gian
    private function getTimeAgo($date)
    {
        if (!$date) {
            return '';
        }

        $carbon = Carbon::parse($date);
        $now = Carbon::now();

        // Kiểm tra nếu thời gian là dưới 1 phút
        if ($carbon->diffInMinutes($now) < 1) {
            return 'Vừa xong';
        }

        // Nếu trong ngày hôm nay
        if ($carbon->isToday()) {
            return $carbon->diffForHumans($now, [
                'parts' => 1,
                'join' => '',
                'syntax' => Carbon::DIFF_RELATIVE_TO_NOW
            ]);
        }

        // Nếu là ngày hôm qua
        if ($carbon->isYesterday()) {
            return 'Hôm qua';
        }

        // Nếu cùng năm
        if ($carbon->isSameYear($now)) {
            return $carbon->format('d/m');
        }

        // Nếu khác năm
        return $carbon->format('d/m/Y');
    }
    // Lấy gói mua nhiều
    public function getTopPackages($limit = 6)
    {
        return CartDetail::select('name_price_list', 'description')
            ->selectRaw('SUM(quantity) as total_quantity')
            ->groupBy('name_price_list', 'description')
            ->orderByDesc('total_quantity')
            ->limit($limit)
            ->get();
    }
    // Thống kê doanh thu theo tháng
    public function getMonthlyRevenue()
    {
        $currentYear = Carbon::now()->year;

        $result = CartDetail::selectRaw('MONTH(created_at) as month, SUM(price * quantity) as revenue')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('revenue', 'month')
            ->toArray();

        $monthlyRevenue = array_fill(1, 12, null);

        foreach ($result as $month => $revenue) {
            $monthlyRevenue[$month] = (float) $revenue;
        }

        return $monthlyRevenue;
    }
    // Thống kê số người đưa tin
    public function getTopRatedPosters($limit = 5)
    {
        $topPosters = User::where('role', self::Owner)
            ->withCount('receivedComments as total_reviews')
            ->withAvg('receivedComments as average_rating', 'rating')
            ->withMax('receivedComments as latest_review_date', 'created_at')
            ->having('total_reviews', '>', 0)
            ->orderByRaw('CASE WHEN average_rating = 5 THEN 1 ELSE 0 END DESC')
            ->orderByRaw('CASE WHEN average_rating = 5 THEN total_reviews ELSE 0 END DESC')
            ->orderByDesc('average_rating')
            ->orderByDesc('total_reviews')
            ->orderByDesc('latest_review_date')
            ->take($limit)
            ->get();
        $topPosters->each(function ($user) {
            $user->ratings_distribution = $this->getRatingsDistribution($user->id);
            $user->average_rating = number_format($user->average_rating, 1);
        });

        return $topPosters;
    }
    private function getRatingsDistribution($userId)
    {
        $totalReviews = Comment::where('commented_user_id', $userId)->count();
        $distribution = [];

        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $count = Comment::where('commented_user_id', $userId)
                    ->where('rating', $i)
                    ->count();
                $distribution[$i] = ($count / $totalReviews) * 100;
            }
        } else {
            $distribution = array_fill(1, 5, 0);
        }
        return $distribution;
    }
    // 4 báo cáo mới nhất
    public function getLatestReports($limit = 4)
    {
        $today = now()->startOfDay();

        return Report::with(['user', 'room'])
            ->select('reports.*', 'users.name as user_name', 'rooms.title as room_title')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->leftJoin('rooms', 'reports.room_id', '=', 'rooms.id')
            ->where('reports.status', self::Chua_Duyet)
            ->where('reports.created_at', '>=', $today)
            ->orderBy('reports.created_at', 'desc')
            ->take($limit)
            ->get();
    }
    // Danh sách loại phòng
    public function getRoomsCountByCategoryType()
    {
        return Room::join('categories', 'rooms.category_id', '=', 'categories.id')
            ->selectRaw('categories.name as category_name, count(*) as count')
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('count')  // Sắp xếp theo số lượng phòng giảm dần
            ->pluck('count', 'category_name')
            ->toArray();
    }
    // Tổng số phòng
    public function getTotalRooms()
    {
        return Room::count();
    }
    // Tổng số loại phòng
    public function getTotalCategories()
    {
        return Category::count();
    }
    public function getTopCategories($limit = 2)
    {
        return Category::withCount('rooms')
            ->orderByDesc('rooms_count')
            ->take($limit)
            ->pluck('name');
    }
    // số lượng mua gói theo tháng trong năm hiện tại, cho phép so sánh giữa các tháng và tính toán tỷ lệ tăng trưởng.
    public function getPackagePurchaseStatistics()
    {
        // Lấy năm và tháng hiện tại
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        // Truy vấn database để lấy số lượng mua gói theo tháng trong năm hiện tại
        $result = CartDetail::selectRaw('MONTH(created_at) as month, COUNT(*) as purchases')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('purchases', 'month')
            ->toArray();

        // Khởi tạo mảng chứa số lượng mua gói cho 12 tháng, mặc định là 0
        $monthlyPurchases = array_fill(1, 12, 0);

        // Cập nhật số lượng mua gói cho các tháng có dữ liệu
        foreach ($result as $month => $purchases) {
            $monthlyPurchases[$month] = (int) $purchases;
        }

        // Tính tổng số lượng mua gói trong năm
        $totalPurchases = array_sum($monthlyPurchases);

        // Lấy số lượng mua gói của tháng hiện tại và tháng trước
        $currentMonthPurchases = $monthlyPurchases[$currentMonth] ?? 0;
        $lastMonthPurchases = $monthlyPurchases[$currentMonth - 1] ?? 0;

        // Tính phần trăm tăng trưởng so với tháng trước
        $increasePercentage = $lastMonthPurchases > 0
            ? round((($currentMonthPurchases - $lastMonthPurchases) / $lastMonthPurchases) * 100, 2)
            : ($currentMonthPurchases > 0 ? 100 : 0);

        // Trả về mảng chứa các thông tin thống kê
        return [
            'totalPurchases' => $totalPurchases,            // Tổng số lượt mua gói trong năm
            'currentMonthPurchases' => $currentMonthPurchases,  // Số lượt mua gói tháng hiện tại
            'purchaseIncreasePercentage' => $increasePercentage,  // Phần trăm tăng trưởng so với tháng trước
            'monthlyPurchases' => $monthlyPurchases         // Mảng chứa số lượng mua gói của từng tháng
        ];
    }
}
