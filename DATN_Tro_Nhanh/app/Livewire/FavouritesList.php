<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Favourite;



class FavouritesList extends Component
{
    use WithPagination;

    public $perPage = 6;
    public $search = '';
    public $sortBy = 'date_new_to_old';

    public function render()
    {
        $query = Favourite::with('room');

        if ($this->search) {
            $query->whereHas('room', function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        switch ($this->sortBy) {
            case 'name':
                $query->orderBy('rooms.title', 'asc');
                break;
            case 'price_low_to_high':
                $query->orderBy('rooms.price', 'asc');
                break;
            case 'price_high_to_low':
                $query->orderBy('rooms.price', 'desc');
                break;
            case 'date_old_to_new':
                $query->orderBy('created_at', 'asc');
                break;
            case 'date_new_to_old':
                $query->orderBy('created_at', 'desc');
                break;
        }

        $favourites = $query->paginate($this->perPage);

        return view('livewire.favourites-list', [
            'favourites' => $favourites,
        ]);
    }
}