<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone;

class ZonesTab extends Component
{
    use WithPagination;

    public $userId;
  

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        // $zones = Zone::where('user_id', $this->userId)->paginate(1, ['*'], 'khu-tro');
        $zones = Zone::where('user_id', $this->userId)->paginate(6); // Số lượng item trên mỗi trang
        return view('livewire.zones-tab', ['zones' => $zones]);
    }
}