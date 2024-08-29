<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Room;
use App\Models\Blog;
use App\Models\Zone;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommentClientService
{
    public function submitReview($data)
    {
        // Tìm phòng theo slug
        $room = Room::where('slug', $data['room_slug'])->first();

        if (!$room) {
            return null;
        }

        $review = new Comment();
        $review->rating = $data['rating'];
        $review->content = $data['content'];
        $review->user_id = Auth::id();
        $review->room_id = $room->id;
        $review->save();

        return $review;
    }
    public function submitZone($data)
    {
        // Tìm phòng theo slug
        $zone = Zone::where('slug', $data['zone_slug'])->first();

        if (!$zone) {
            return null;
        }

        $review = new Comment();
        $review->rating = $data['rating'];
        $review->content = $data['content'];
        $review->user_id = Auth::id();
        $review->zone_id = $zone->id;
        $review->save();

        return $review;
    }

    public function submitBlogs($data)
    {
        $blog = Blog::where('slug', $data['blog_slug'])->first();

        if (!$blog) {
            return null;
        }

        $comment = new Comment();
        $comment->content = $data['content'];
        $comment->user_id = Auth::id();

        if (!$comment->user_id) {
            return null;
        }

        $comment->blog_id = $blog->id;
        $comment->save();

        return $comment;
    }
    public function submitUsers($data)
    {
        $user = User::where('slug', $data['user_slug'])->first();

        if (!$user) {
            return null;
        }

        $comment = new Comment();
        $comment->rating = $data['rating'];
        $comment->content = $data['content'];
        $comment->user_id = Auth::id();

        if (!$comment->user_id) {
            return null;
        }

        $comment->user_id = $user->id;
        $comment->save();

        return $comment;
    }
    public function getBlogWithComments($slug)
    {

        $blog = Blog::where('slug', $slug)->with('comments')->first();

        if (!$blog) {
            return null;
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

        $comments = $room->comments()->orderBy('created_at', 'desc')->get();

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

    public function getUserDetailsWithRatings($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $totalReviews = $user->comments()->count();
        $averageRating = $totalReviews > 0 ? $user->comments()->avg('rating') : 0;

        $ratingsDistribution = [];
        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $ratingsDistribution[$i] = $user->comments()->where('rating', $i)->count() / $totalReviews * 100;
            }
        } else {
            $ratingsDistribution = array_fill(1, 5, 0);
        }

        $comments = $user->comments()->orderBy('created_at', 'desc')->get();

        return [
            'user' => $user,
            'averageRating' => $averageRating,
            'ratingsDistribution' => $ratingsDistribution,
            'comments' => $comments,
        ];
    }

}
