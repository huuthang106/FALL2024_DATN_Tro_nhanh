<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Favourite;
use Carbon\Carbon;

class FavouritesList extends Component
{
    use WithPagination;

 public $search = '';
public $perPage = 6;
public $sortBy = 'date_new_to_old';
public $timeFilters = '';
 // Thêm thuộc tính để lưu giá trị của khoảng thời gian lọc

    public function render()
    {
        $query = Favourite::with('room');

        // Lọc theo từ khóa tìm kiếm
        if ($this->search) {
            $query->whereHas('room', function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo khoảng thời gian
        if ($this->timeFilters) {
            $date = Carbon::now()->copy();
            switch ($this->timeFilters) {
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
            // Lọc theo created_at và updated_at của bảng room
        $query->whereHas('room', function ($q) use ($date) {
            $q->where('created_at', '>=', $date)
              ->orWhere('updated_at', '>=', $date);
        });
        }

        $favourites = $query->paginate($this->perPage);

        return view('livewire.favourites-list', [
            'favourites' => $favourites,
        ]);
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    }
}
