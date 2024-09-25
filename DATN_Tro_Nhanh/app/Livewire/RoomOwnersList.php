<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\PriceList;
use Illuminate\Support\Facades\Auth;
use App\Services\RoomOwnersService;
use Carbon\Carbon;

class RoomOwnersList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'date_new_to_old';
    public $perPage = 10;
    public $roomCount;
    protected $roomOwnersService;
    protected $queryString = ['search', 'sortBy', 'perPage'];
    public const Goitin = 2; // Đúng cú pháp
    public $timeFilter = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function updatingSortBy()
    // {
    //     $this->resetPage();
    // }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingFilterByDate()
{
    $this->resetPage();
}

    public function mount(RoomOwnersService $roomOwnersService)
    {
        $this->roomOwnersService = $roomOwnersService;
        $this->roomCount = Room::where('user_id', Auth::id())->count();
    }

    public function getRoomImageUrl(Room $room): string
    {
        $image = $room->images->first();
        return $image ? asset('assets/images/' . $image->filename) : asset('assets/images/properties-grid-08.jpg');
    }

    public function render()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $priceList = PriceList::where('status', self::Goitin)->get();
        $query = Room::where('user_id', $userId)
        ->orderBy('created_at', 'desc'); // Thêm điều kiện sắp xếp từ ngày mới nhất tới cũ nhất

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }
        
        if ($this->timeFilter) {
            $date = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $date->subDays(1);
                    break;
                case '7_day':
                    $date->subDays(7);
                    break;
                case '1_month':
                    $date->subMonth();
                    break;
                case '3_month':
                    $date->subMonths(3);
                    break;
                case '6_month':
                    $date->subMonths(6);
                    break;
                case '1_year':
                    $date->subYear();
                    break;
            }
            $query->whereDate('created_at', '>=', $date); // Lọc theo ngày tạo
        }

        $rooms = $query->paginate($this->perPage);

        return view('livewire.room-owners-list', [
            'rooms' => $rooms,
            'priceList' => $priceList,
            'user' => $user
        ]);
    }
}
