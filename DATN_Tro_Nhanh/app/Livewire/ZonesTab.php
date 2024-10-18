<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone;
use App\Models\Favourite;
use App\Services\FavouritesServices;

class ZonesTab extends Component
{
    use WithPagination;

    public $userId;
    public $favouriteCount;

    protected $listeners = ['favoriteUpdated' => 'updateFavouriteCount'];

    public function mount()
    {
        $this->favouriteCount = Favourite::where('user_id', auth()->id())->count();
    }

    public function updateFavouriteCount($count)
    {
        $this->favouriteCount = $count;
    }

    // public function mount($userId)
    // {
    //     $this->userId = $userId;
    // }
    public function render()
    {
        // $zones = Zone::where('user_id', $this->userId)->paginate(1, ['*'], 'khu-tro');
        $zones = Zone::where('user_id', $this->userId)->paginate(6); // Số lượng item trên mỗi trang
        return view('livewire.zones-tab', ['zones' => $zones]);
    }
}
