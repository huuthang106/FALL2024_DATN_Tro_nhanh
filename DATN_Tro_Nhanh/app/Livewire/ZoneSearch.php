<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Zone;
use App\Models\Room;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class ZoneSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'name';
    public $orderAsc = true;

    protected $queryString = ['search', 'perPage', 'orderBy', 'orderAsc'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function setOrderBy($field)
    {
        if ($this->orderBy === $field) {
            $this->orderAsc = !$this->orderAsc;
        } else {
            $this->orderAsc = true;
        }
        $this->orderBy = $field;
    }

    // public function render()
    // {
    //     Log::info('Rendering with search: "' . $this->search . '"');

    //     $query = Zone::where('name', 'like', '%'.$this->search.'%')
    //                  ->orWhere('description', 'like', '%'.$this->search.'%')
    //                  ->orWhere('address', 'like', '%'.$this->search.'%');

    //     $zones = $query->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
    //                    ->paginate($this->perPage);

    //     Log::info('Found ' . $zones->count() . ' zones');

    //     return view('livewire.zone-search', [
    //         'zones' => $zones
    //     ]);
    // }
    public function render()
{
    Log::info('Đang tìm kiếm với từ khóa: "' . $this->search . '"');

    $query = Zone::where('user_id', auth()->id())
                 ->where(function($q) {
                     $q->where('name', 'like', '%'.$this->search.'%')
                       ->orWhere('description', 'like', '%'.$this->search.'%')
                       ->orWhere('address', 'like', '%'.$this->search.'%');
                 });

    $zones = $query->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                   ->paginate($this->perPage);
                     // Đếm số lượng phòng cho từng zone
    foreach ($zones as $zone) {
        $zone->room_count = Room::where('zone_id', $zone->id)->count();
    }

    Log::info('Tìm thấy ' . $zones->count() . ' khu vực');

    return view('livewire.zone-search', [
        'zones' => $zones
    ]);
}
}
