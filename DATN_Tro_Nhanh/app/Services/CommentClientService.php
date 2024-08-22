<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Room;
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



}
