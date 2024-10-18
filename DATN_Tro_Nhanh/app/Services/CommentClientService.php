<?php

namespace App\Services;

use App\Models\CommentUsers;
use App\Models\Comment;
use App\Models\CommentZones;
use App\Models\Room;
use App\Models\Blog;
use App\Models\Zone;
use App\Models\CommentBlogs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class CommentClientService
{
    public function submitReview($data)
    {
        // Tìm phòng theo slug
        $room = Room::where('slug', $data['room_slug'])->first();

        if (!$room) {
            return null; // Trả về null nếu không tìm thấy phòng
        }

        // Kiểm tra xem người dùng đã đánh giá phòng này chưa
        $existingReview = Comment::where('room_id', $room->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReview) {
            return false; // Hoặc xử lý theo cách khác
        }

        // Tạo bình luận mới
        $review = new Comment();
        $review->rating = $data['rating'];
        $review->content = $data['content'];
        $review->user_id = Auth::id();
        $review->room_id = $room->id;
        $review->save();

        return true; // Trả về bình luận mới
    }
    public function submitZone($data)
    {
        // Tìm phòng theo slug
        $zone = Zone::where('slug', $data['zone_slug'])->first();

        if (!$zone) {
            return null;
        }

        $review = new CommentZones();
        $review->rating = $data['rating'];
        $review->content = $data['content'];
        $review->user_id = Auth::id();
        $review->zone_id = $zone->id;
        $review->save();

        return $review;
    }
    public function countTotalReviews()
    {
        try {
            $userId = Auth::id(); // Lấy ID của người dùng hiện tại

            if ($userId) {
                // Đếm tổng số đánh giá của người dùng hiện tại
                return CommentUsers::where('commented_user_id', $userId)->count();
            }

            // Nếu không có userId, trả về 0
            return 0;
        } catch (\Exception $e) {
            // Ghi lại lỗi nếu có sự cố khi đếm tổng số đánh giá
            Log::error('Error counting total reviews: ' . $e->getMessage());
            return 0;
        }
    }
    // public function submitBlogs($data)
    // {
    //     $blog = Blog::where('slug', $data['blog_slug'])->first();

    //     if (!$blog) {
    //         return null;
    //     }

    //     $comment = new Comment();
    //     $comment->content = $data['content'];
    //     $comment->user_id = Auth::id();

    //     if (!$comment->user_id) {
    //         return null;
    //     }

    //     $comment->blog_id = $blog->id;
    //     $comment->save();

    //     return $comment;
    // }
    public function checkExistingBlogComment($userId, $blogSlug)
    {
        $blog = Blog::where('slug', $blogSlug)->first();
        if (!$blog) {
            return false;
        }
        return CommentBlogs::where('user_id', $userId)->where('blog_id', $blog->id)->exists();
    }
    
    public function submitBlogs($data)
    {
        $blog = Blog::where('slug', $data['blog_slug'])->first();
    
        if (!$blog) {
            return null;
        }
    
        $comment = new CommentBlogs(); // Sử dụng model CommentBlogs
        $comment->content = $data['content'];
        $comment->user_id = Auth::id();
        $comment->blog_id = $blog->id;
        $comment->save();
    
        return $comment;
    }
    // public function submitUsers($data)
    // {
    //     $user = User::where('slug', $data['user_slug'])->first();

    //     if (!$user) {
    //         return null;
    //     }

    //     $comment = new Comment();
    //     $comment->rating = $data['rating'];
    //     $comment->content = $data['content'];
    //     $comment->user_id = Auth::id(); // Sửa lại để lấy user_id của người đang đăng nhập

    //     if (!$comment->user_id) {
    //         return null;
    //     }

    //     $comment->commented_user_id = $user->id; // Thêm trường này để lưu user_id của người được đánh giá
    //     $comment->save();

    //     return $comment;
    // }
    // public function submitUsers($data)
    // {
    //     $user = User::where('slug', $data['user_slug'])->first();

    //     if (!$user) {
    //         return null; // Người dùng không tồn tại
    //     }

    //     // Kiểm tra xem người dùng đã đánh giá người dùng này chưa
    //     $existingComment = Comment::where('user_id', Auth::id())
    //         ->where('commented_user_id', $user->id)
    //         ->first();

    //     if ($existingComment) {
    //         return false; // Người dùng đã đánh giá, trả về false
    //     }

    //     $comment = new Comment();
    //     $comment->rating = $data['rating'];
    //     $comment->content = $data['content'];
    //     $comment->user_id = Auth::id(); // Lấy user_id của người đang đăng nhập

    //     if (!$comment->user_id) {
    //         return null; // Nếu không có user_id, trả về null
    //     }

    //     $comment->commented_user_id = $user->id; // Lưu user_id của người được đánh giá
    //     $comment->save();

    //     return true; // Trả về true nếu bình luận được lưu thành công
    // }
    public function submitUsers($data)
    {
        $user = User::where('slug', $data['user_slug'])->first();

        if (!$user) {
            return null; // Người dùng không tồn tại
        }

        // Kiểm tra xem người dùng đã đánh giá người dùng này chưa
        $existingComment = Comment::where('user_id', Auth::id())
            ->where('commented_user_id', $user->id)
            ->first();

        if ($existingComment) {
            return false; // Người dùng đã đánh giá, trả về false
        }

        $comment = new Comment();
        $comment->rating = $data['rating'];
        $comment->content = $data['content'];
        $comment->user_id = Auth::id(); // Lấy user_id của người đang đăng nhập

        if (!$comment->user_id) {
            return null; // Nếu không có user_id, trả về null
        }

        $comment->commented_user_id = $user->id; // Lưu user_id của người được đánh giá
        $comment->save();

        return true; // Trả về true nếu bình luận được lưu thành công
    }
    public function getBlogWithComments($slug)

    {
        $blog = Blog::where('slug', $slug)->with('comments')->first();

        if (!$blog) {
            return null;
        }

        // Lưu cookie khi người dùng click vào xem blog
        $cookieName = 'viewed_blogs'; // Tên cookie
        $viewedBlogs = json_decode(request()->cookie($cookieName), true) ?: []; // Lấy danh sách ID blog đã xem từ cookie

        // Kiểm tra xem blog đã được xem chưa
        if (!in_array($blog->id, $viewedBlogs)) {
            // Tăng lượt xem cho blog
            $blog->increment('view');
            // Thêm ID blog vào danh sách đã xem
            $viewedBlogs[] = $blog->id;

            // Cập nhật cookie với danh sách ID blog đã xem
            $cookieValue = json_encode($viewedBlogs);
            cookie()->queue($cookieName, $cookieValue, 60 * 6); // Thời gian sống cookie: 30 ngày
        }

        return $blog;
    }


    public function getRoomDetailsWithRatings($slug)
    {
        $room = Room::where('slug', $slug)->firstOrFail();

        $totalReviews = $room->comments()->count();
        $averageRating = $totalReviews > 0 ? $room->comments()->avg('rating') : 0;

        $ratingsDistribution = [];
        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $ratingsDistribution[$i] = $room->comments()->where('rating', $i)->count() / $totalReviews * 100;
            }
        } else {
            $ratingsDistribution = array_fill(1, 5, 0);
        }

        $comments = $room->comments()->orderBy('created_at', 'desc')->paginate(5);

        return [
            'room' => $room,
            'averageRating' => $averageRating,
            'ratingsDistribution' => $ratingsDistribution,
            'comments' => $comments,
        ];
    }
    public function getZoneDetailsWithRatings($slug)
    {
        $zone = Zone::where('slug', $slug)->firstOrFail();

        $totalReviews = $zone->comments()->count();
        $averageRating = $totalReviews > 0 ? $zone->comments()->avg('rating') : 0;

        $ratingsDistribution = [];
        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $ratingsDistribution[$i] = $zone->comments()->where('rating', $i)->count() / $totalReviews * 100;
            }
        } else {
            $ratingsDistribution = array_fill(1, 5, 0);
        }

        $comments = $zone->comments()->orderBy('created_at', 'desc')->get();

        return [
            'zone' => $zone,
            'averageRating' => $averageRating,
            'ratingsDistribution' => $ratingsDistribution,
            'comments' => $comments,
        ];
    }

    // public function getUserDetailsWithRatings($slug)
    // {
    //     $user = User::where('slug', $slug)->firstOrFail();

    //     $totalReviews = Comment::where('commented_user_id', $user->id)->count();
    //     $averageRating = $totalReviews > 0 ? Comment::where('commented_user_id', $user->id)->avg('rating') : 0;

    //     $ratingsDistribution = [];
    //     if ($totalReviews > 0) {
    //         for ($i = 5; $i >= 1; $i--) {
    //             $ratingsDistribution[$i] = Comment::where('commented_user_id', $user->id)->where('rating', $i)->count() / $totalReviews * 100;
    //         }
    //     } else {
    //         $ratingsDistribution = array_fill(1, 5, 0);
    //     }

    //     $comments = Comment::where('commented_user_id', $user->id)->orderBy('created_at', 'desc')->get();

    //     return [
    //         'user' => $user,
    //         'averageRating' => $averageRating,
    //         'ratingsDistribution' => $ratingsDistribution,
    //         'comments' => $comments,
    //     ];
    // }
    public function getUserDetailsWithRatings($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $totalReviews = CommentZones::where('user_id', $user->id)->count();
        $averageRating = $totalReviews > 0 ? CommentZones::where('user_id', $user->id)->avg('rating') : 0;

        $ratingsDistribution = [];
        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $ratingsDistribution[$i] = CommentZones::where('user_id', $user->id)->where('rating', $i)->count() / $totalReviews * 100;
            }
        } else {
            $ratingsDistribution = array_fill(1, 5, 0);
        }

        $comments = CommentZones::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return [
            'user' => $user,
            'averageRating' => $averageRating,
            'ratingsDistribution' => $ratingsDistribution,
            'comments' => $comments,
        ];
    }
}
