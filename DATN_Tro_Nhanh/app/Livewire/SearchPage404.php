<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Blog;

class SearchPage404 extends Component
{
    // public function render()
    // {
    //     return view('livewire.search-page404');
    // }
    public $search = '';
    public $results = [];
    public $hasSearched = false;
    public $latestRooms;
    public $latestBlogs;
    const HIEN_THI_ROOM = 2;
    const HIEN_THI_BLOG = 1;
    const DO_DAI_KY_TU_TIM_KIEM = 2;
    const DO_DAI_KET_QUA_TIM_KIEM = 5;
    public function getRoomImageUrl(Room $room): string
    {
        $image = $room->images->first();
        return $image ? asset('assets/images/' . $image->filename) : asset('assets/images/properties-grid-08.jpg');
    }
    public function mount()
    {
        $this->latestRooms = Room::where('status', self::HIEN_THI_ROOM)
            ->orderByRaw('CASE WHEN expiration_date > NOW() THEN 0 ELSE 1 END')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        $this->latestBlogs = Blog::where('status', self::HIEN_THI_BLOG)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }
    public function updatedSearch()
    {
        // Phòng VIP sẽ xuất hiện trước.
        // Trong số các phòng VIP hoặc không VIP, những phòng có từ khóa tìm kiếm trong tiêu đề sẽ xuất hiện trước.
        // Nếu có nhiều phòng cùng mức độ phù hợp, phòng mới nhất sẽ xuất hiện trước.
        $this->hasSearched = strlen($this->search) > 0;

        if (strlen($this->search) >= self::DO_DAI_KY_TU_TIM_KIEM) {
            $this->results = Room::where('status', self::HIEN_THI_ROOM)
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('address', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                })
                ->orderByRaw('CASE WHEN expiration_date > NOW() THEN 0 ELSE 1 END')
                ->orderBy('created_at', 'desc')
                ->limit(self::DO_DAI_KET_QUA_TIM_KIEM)
                ->get();
        } else {
            $this->results = collect();
        }
    }

    public function render()
    {
        return view('livewire.search-page404');
    }
}
