<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use App\Models\CartDetail;
use App\Models\Comment;
use App\Models\Report;
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
                    'image' => $user->image
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
        return Report::with(['user', 'room'])
            ->select('reports.*', 'users.name as user_name', 'rooms.title as room_title')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->leftJoin('rooms', 'reports.room_id', '=', 'rooms.id')
            ->where('reports.status', self::Chua_Duyet)
            ->orderBy('reports.created_at', 'desc')
            ->take($limit)
            ->get();
    }
}
