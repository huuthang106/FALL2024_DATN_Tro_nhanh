<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use App\Models\CartDetail;
use App\Models\CommentUsers;
use App\Models\Bill;
use App\Models\Report;
use App\Models\Room;
use App\Models\Zone;
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
        return DB::table('vip_zone_positions')
            ->join('locations', 'vip_zone_positions.location_id', '=', 'locations.id')
            ->select('locations.name', 'locations.type_vip')
            ->selectRaw('COUNT(*) as total_purchases')
            ->groupBy('locations.id', 'locations.name', 'locations.type_vip')
            ->orderByDesc('total_purchases')
            ->limit($limit)
            ->get();
    }
    // Thống kê số lượng mua gói theo tháng
    public function getMonthlyVIPPurchases()
    {
        $currentDate = Carbon::now();
        $currentMonth = $currentDate->month;
        $currentYear = $currentDate->year;
        $lastMonth = $currentDate->subMonth();

        $result = DB::table('vip_zone_positions')
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as purchases')
            ->whereRaw(
                '(YEAR(created_at) = ? AND MONTH(created_at) = ?) OR (YEAR(created_at) = ? AND MONTH(created_at) = ?)',
                [$currentYear, $currentMonth, $lastMonth->year, $lastMonth->month]
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        $monthlyVIPPurchases = [
            $currentMonth => 0,
            $lastMonth->month => 0
        ];

        foreach ($result as $row) {
            $monthlyVIPPurchases[$row->month] = (int) $row->purchases;
        }

        return $monthlyVIPPurchases;
    }
    // Thống kê số người đưa tin
    public function getTopRatedPosters($limit = 5)
    {
        $topPosters = User::where('role', self::Owner)
            ->withCount('receivedCommentsAdmin as total_reviews')
            ->withAvg('receivedCommentsAdmin as average_rating', 'rating')
            ->withMax('receivedCommentsAdmin as latest_review_date', 'created_at')
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
        $totalReviews = CommentUsers::where('commented_user_id', $userId)->count();
        $distribution = [];

        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $count = CommentUsers::where('commented_user_id', $userId)
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

        return Report::with(['user', 'zone'])
            ->select('reports.*', 'users.name as user_name', 'zones.name as zone_name', 'reported_users.name as reported_person_name')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->leftJoin('zones', 'reports.zone_id', '=', 'zones.id')
            ->leftJoin('users as reported_users', 'reports.reported_person', '=', 'reported_users.id')
            ->where('reports.status', self::Chua_Duyet)
            ->where('reports.created_at', '>=', $today)
            ->orderBy('reports.created_at', 'desc')
            ->take($limit)
            ->get();
    }
    // Danh sách loại phòng

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
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $result = DB::table('vip_zone_positions')
            ->join('locations', 'vip_zone_positions.location_id', '=', 'locations.id')
            ->join('price_lists', 'locations.id', '=', 'price_lists.location_id')
            ->selectRaw('MONTH(vip_zone_positions.created_at) as month, SUM(price_lists.price) as total_amount')
            ->whereYear('vip_zone_positions.created_at', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total_amount', 'month')
            ->toArray();

        $monthlyRevenue = array_fill(1, 12, 0);

        foreach ($result as $month => $amount) {
            $monthlyRevenue[$month] = (int) $amount;
        }

        $totalRevenue = array_sum($monthlyRevenue);
        $currentMonthRevenue = $monthlyRevenue[$currentMonth] ?? 0;
        $lastMonthRevenue = $monthlyRevenue[$currentMonth - 1] ?? 0;

        $increasePercentage = $lastMonthRevenue > 0
            ? round((($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100, 2)
            : ($currentMonthRevenue > 0 ? 100 : 0);

        return [
            'totalRevenue' => $totalRevenue,
            'currentMonthRevenue' => $currentMonthRevenue,
            'revenueIncreasePercentage' => $increasePercentage,
            'monthlyRevenue' => $monthlyRevenue
        ];
    }
    public function getZonesCountByCategoryType()
    {
        return Zone::join('categories', 'zones.category_id', '=', 'categories.id')
            ->selectRaw('categories.name as category_name, count(*) as count')
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('count')  // Sắp xếp theo số lượng zone giảm dần
            ->pluck('count', 'category_name')
            ->toArray();
    }
}
