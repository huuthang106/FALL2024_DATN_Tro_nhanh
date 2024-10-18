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
    public $timeFilter = '';
    protected $queryString = ['search', 'timeFilter'];

    public function render()
    {
        $favourites = $this->getFavourites();

        return view('livewire.favourites-list', [
            'favourites' => $favourites,
        ]);
    }

    protected function getFavourites()
    {
        $query = Favourite::with('zone');

        // Lọc theo từ khóa tìm kiếm
        if ($this->search) {
            $query->whereHas('zone', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $startDate = $this->getStartDate($this->timeFilter);
            $query->whereDate('created_at', '<=', $startDate);
        }
        // Sắp xếp theo thời gian tạo, mới nhất đứng đầu
        $query->orderBy('created_at', 'desc');
        return $query->paginate($this->perPage);
    }

    protected function getStartDate($timeFilter)
    {
        switch ($timeFilter) {
            case '1_day':
                return Carbon::now()->subDay()->startOfDay();
            case '7_day':
                return Carbon::now()->subDays(7)->startOfDay();
            case '1_month':
                return Carbon::now()->subMonth()->startOfDay();
            case '3_month':
                return Carbon::now()->subMonths(3)->startOfDay();
            case '6_month':
                return Carbon::now()->subMonths(6)->startOfDay();
            case '1_year':
                return Carbon::now()->subYear()->startOfDay();
            default:
                return Carbon::now(); // Trả về ngày hiện tại nếu không có bộ lọc
        }
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    }
}
