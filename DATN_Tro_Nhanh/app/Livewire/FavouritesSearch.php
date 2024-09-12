<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Favourite;

class FavouritesSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'date_new_to_old'; // Giá trị mặc định cho sắp xếp
    public $perPage = 10;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $favourites = Favourite::with('room')
            ->when($this->search, function($query) {
                $query->whereHas('room', function($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->sortBy, function($query) {
                switch ($this->sortBy) {
                    case 'name':
                        $query->orderBy('room.title');
                        break;
                    case 'price_low_to_high':
                        $query->orderBy('room.price', 'asc');
                        break;
                    case 'price_high_to_low':
                        $query->orderBy('room.price', 'desc');
                        break;
                    case 'date_old_to_new':
                        $query->orderBy('created_at', 'asc');
                        break;
                    case 'date_new_to_old':
                        $query->orderBy('created_at', 'desc');
                        break;
                }
            })
            ->paginate($this->perPage);

        return view('livewire.favourites-search', [
            'favourites' => $favourites,
        ]);
    }
}
