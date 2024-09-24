<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\PriceList;
use Illuminate\Support\Facades\Auth;
use App\Services\RoomOwnersService;

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


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
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
        $query = Room::where('user_id', $userId);

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        switch ($this->sortBy) {
            case 'name':
                $query->orderBy('title', 'asc');
                break;
            case 'price_low_to_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_to_low':
                $query->orderBy('price', 'desc');
                break;
            case 'date_old_to_new':
                $query->orderBy('created_at', 'asc');
                break;
            case 'date_new_to_old':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        $rooms = $query->paginate($this->perPage);

        return view('livewire.room-owners-list', [
            'rooms' => $rooms,
            'priceList' => $priceList,
            'user' => $user
        ]);
    }
}
