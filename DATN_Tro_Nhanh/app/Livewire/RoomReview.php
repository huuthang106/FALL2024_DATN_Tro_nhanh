<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class RoomReview extends Component
{
    use WithPagination;

    public $slug;
    public $room;
    public $averageRating;
    public $ratingsDistribution;
   
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadRoomDetails();
    }

    public function loadRoomDetails()
    {
        $room = Room::where('slug', $this->slug)->first();

        if (!$room) {
            $this->room = null;
            return;
        }

        $this->room = $room;

        $totalReviews = $room->comments()->count();
        $this->averageRating = $totalReviews > 0 ? $room->comments()->avg('rating') : 0;

        $this->ratingsDistribution = [];
        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $this->ratingsDistribution[$i] = $room->comments()->where('rating', $i)->count() / $totalReviews * 100;
            }
        } else {
            $this->ratingsDistribution = array_fill(1, 5, 0);
        }
    }


    public function confirmDelete($commentId)
    {
                // Ghi log vào đây
                Log::info("Xóa bình luận với ID: " . $commentId);
        $this->deleteComment($commentId);
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment) {
            $comment->forceDelete();
            $this->dispatch('commentDeleted', ['message' => 'Bình luận đã được xóa thành công.']);
        } else {
            $this->dispatch('commentDeleted', ['message' => 'Bình luận không tồn tại.']);
        }
    }

    public function render()
    {
        $comments = $this->room ? $this->room->comments()->orderBy('created_at', 'desc')->paginate(5) : [];

        return view('livewire.room-review', [
            'comments' => $comments,
        ]);
    }
}