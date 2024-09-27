<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Zone;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SearchZones extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'name';
    public $orderAsc = true;
    public $timeFilter = '';
    protected $queryString = ['search', 'perPage', 'orderBy', 'orderAsc'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedTimeFilter()
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

        $query = Zone::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->timeFilter) {
            $date = Carbon::now();
            switch ($this->timeFilter) {
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
            $query->whereDate('created_at', '>=', $date); // Lọc theo ngày tạo
        }

        $zones = $query->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.search-zones', [
            'zones' => $zones
        ]);
    }
}
