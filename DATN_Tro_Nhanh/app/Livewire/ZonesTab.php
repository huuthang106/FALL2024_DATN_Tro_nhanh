<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone;

class ZonesTab extends Component
{
    use WithPagination;

    public $userId;
    public $queryString = [
        'page' => ['except' => 1, 'as' => 'trang'],
    ];

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        $zones = Zone::where('user_id', $this->userId)->paginate(6);
        return view('livewire.zones-tab', ['zones' => $zones]);
    }
}