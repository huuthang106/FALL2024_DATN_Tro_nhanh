<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone;
use Carbon\Carbon;

class ZoneTable extends Component
{
    use WithPagination;

    public $search = '';
    public $timeFilter = '';
    public $perPage = 5;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi bộ lọc thời gian
    }

    public function deleteZone($zoneId)
    {
        $zone = Zone::onlyTrashed()->find($zoneId);
        if ($zone) {
            $zone->forceDelete();
            session()->flash('message', 'Đã xóa zone vĩnh viễn.');
        }
    }

    public function render()
    {
        $trashedZonesQuery = Zone::onlyTrashed();
    
        // Áp dụng bộ lọc theo thời gian
        if ($this->timeFilter) {
            $dateFilter = now();
            switch ($this->timeFilter) {
                case '1_day':
                    $dateFilter = now()->subDay();
                    break;
                case '7_day':
                    $dateFilter = now()->subDays(7);
                    break;
                case '1_month':
                    $dateFilter = now()->subMonth();
                    break;
                case '3_month':
                    $dateFilter = now()->subMonths(3);
                    break;
                case '6_month':
                    $dateFilter = now()->subMonths(6);
                    break;
                case '1_year':
                    $dateFilter = now()->subYear();
                    break;
            }
            $trashedZonesQuery->where('updated_at', '>=', $dateFilter);
        }
    
        // Thực hiện truy vấn, sắp xếp theo ngày cập nhật mới nhất trước và phân trang
        $trashedZones = $trashedZonesQuery
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy('updated_at', 'desc') // Sắp xếp theo ngày cập nhật mới nhất
            ->paginate($this->perPage);
    
        return view('livewire.zone-table', [
            'trashedZones' => $trashedZones,
        ]);
    }
    
}

