<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;

class RoomReview extends Component
{
    use WithPagination;

    public $slug; // Chỉ cần slug là public
    public $room; // Thuộc tính để lưu trữ thông tin phòng
    public $averageRating; // Thuộc tính để lưu trữ đánh giá trung bình
    public $ratingsDistribution; // Thuộc tính để lưu trữ phân phối đánh giá

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadRoomDetails();
    }

    public function loadRoomDetails()
    {
        $room = Room::where('slug', $this->slug)->first();

        if (!$room) {
            // Xử lý khi không tìm thấy phòng
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

    public function render()
    {
        $comments = $this->room ? $this->room->comments()->orderBy('created_at', 'desc')->paginate(5) : [];

        return view('livewire.room-review', [
            'comments' => $comments,
        ]);
    }
}