<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class RoomSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 5; // Số lượng kết quả mỗi trang
    public $orderBy = 'created_at'; // Sắp xếp theo trường created_at
    public $orderAsc = false; // Sắp xếp theo thứ tự giảm dần

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

    public function render()
    {
        Log::info('Searching for rooms with: ' . $this->search);
        $query = Room::where('user_id', Auth::id())
        ->where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
        });

        $rooms = $query->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        // Log thông tin ra console
        $message = "Found " . $rooms->count() . " rooms";

        return view('livewire.room-search', [
            'rooms' => $rooms,
            'message' => $message
        ]);
    }
}
