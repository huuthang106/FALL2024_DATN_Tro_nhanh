<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;

class ListRoomClient extends Component
{
    // public function render()
    // {
    //     return view('livewire.list-room-client');
    // }
    use WithPagination;

    public $search;
    public $province;
    public $district;
    public $village;
    public $perPage = 8;
    public $sortBy = 'default';
    protected $queryString = ['search', 'province', 'district', 'village'];
    public function render()
    {
        $query = Room::join('users', 'rooms.user_id', '=', 'users.id')
            ->where('rooms.status', 2)
            ->withCount('images')
          ;

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('rooms.title', 'like', '%' . $this->search . '%')
                    ->orWhere('rooms.description', 'like', '%' . $this->search . '%')
                    ->orWhere('rooms.address', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->province) {
            $query->where('rooms.province', $this->province);
        }
        if ($this->district) {
            $query->where('rooms.district', $this->district);
        }
        if ($this->village) {
            $query->where('rooms.village', $this->village);
        }

        // Sắp xếp ưu tiên VIP trước
        $query->orderBy('users.has_vip_badge', 'desc');

        // Sau đó sắp xếp theo giá hoặc thời gian tạo
        switch ($this->sortBy) {
            case 'price_asc':
                $query->orderBy('rooms.price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('rooms.price', 'desc');
                break;
            default:
                $query->orderBy('rooms.created_at', 'desc');
                break;
        }

        $rooms = $query->paginate($this->perPage);

        return view('livewire.list-room-client', [
            'rooms' => $rooms
        ]);
    }
}