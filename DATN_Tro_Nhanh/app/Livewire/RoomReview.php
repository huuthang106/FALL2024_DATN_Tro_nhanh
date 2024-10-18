<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone;

use App\Models\CommentZones;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class RoomReview extends Component
{
    use WithPagination;

    public $slug;
    public $zone;
    public $averageRating;
    public $ratingsDistribution;
   
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadRoomDetails();
    }

    public function loadRoomDetails()
    {
        $zone = Zone::where('slug', $this->slug)->first();

        if (!$zone) {
            $this->zone = null;
            return;
        }

        $this->zone = $zone;

        $totalReviews = $zone->comments()->count();
        $this->averageRating = $totalReviews > 0 ? $zone->comments()->avg('rating') : 0;

        $this->ratingsDistribution = [];
        if ($totalReviews > 0) {
            for ($i = 5; $i >= 1; $i--) {
                $this->ratingsDistribution[$i] = $zone->comments()->where('rating', $i)->count() / $totalReviews * 100;
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
        $comment = CommentZones::find($commentId);
        if ($comment) {
            $comment->forceDelete();
            $this->dispatch('commentDeleted', ['message' => 'Bình luận đã được xóa thành công.']);
        } else {
            $this->dispatch('commentDeleted', ['message' => 'Bình luận không tồn tại.']);
        }
    }

    public function render()
    {
        $comments = $this->zone ? $this->zone->comments()->orderBy('created_at', 'desc')->paginate(5) : [];

        return view('livewire.room-review', [
            'comments' => $comments,
        ]);
    }
}