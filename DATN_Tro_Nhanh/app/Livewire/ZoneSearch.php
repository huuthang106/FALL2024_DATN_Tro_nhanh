<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Zone;
use App\Models\Room;
use Livewire\WithPagination;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ZoneSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $orderBy = 'name';
    public $orderAsc = true;
    public $timeFilter = '';
    public $selectedZones = [];
    public $startDate;
    protected $queryString = ['search', 'perPage', 'orderBy', 'orderAsc'];

    public $selectAll = false;
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterByDate()
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

    public function toggleZone($zoneId)
    {
        if (in_array($zoneId, $this->selectedZones)) {
            $this->selectedZones = array_diff($this->selectedZones, [$zoneId]);
        } else {
            $this->selectedZones[] = $zoneId;
        }
        $this->updatedSelectedZones($this->selectedZones);
    }
    public function toggleAllZones($isChecked)
    {
        $emptyZones = Zone::where('user_id', auth()->id())
            ->whereDoesntHave('rooms')
            ->pluck('id')
            ->toArray();

        if ($isChecked) {
            $this->selectedZones = $emptyZones;
        } else {
            $this->selectedZones = [];
        }
    }
    public function deleteSelectedZones()
    {
        $zonesWithRooms = Zone::whereIn('id', $this->selectedZones)
            ->withCount('rooms')
            ->having('rooms_count', '>', 0)
            ->pluck('name')
            ->toArray();

        if (!empty($zonesWithRooms)) {
            $this->dispatch('zones-with-rooms', implode(', ', $zonesWithRooms));
            return;
        }

        $count = count($this->selectedZones);
        $deletedZones = Zone::whereIn('id', $this->selectedZones)->pluck('name')->toArray();
        Zone::whereIn('id', $this->selectedZones)->delete();

        Notification::create([
            'user_id' => Auth::id(),
            'title' => 'Xóa khu vực',
            'content' => 'Đã xóa thành công ' . $count . ' khu vực: ' . implode(', ', $deletedZones),
            'data' => 'Khu Trọ đã được xóa thành công',
            'type' => 'Khu Trọ đã được xóa thành công',
            'is_read' => false
        ]);

        $this->selectedZones = [];
        $this->dispatch('zones-deleted', ['message' => 'Đã xóa thành công ' . $count . ' khu vực.']);
    }

    public function render()
    {
        Log::info('Đang tìm kiếm với từ khóa: "' . $this->search . '"');

        $query = Zone::where('user_id', auth()->id())
            ->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });

        // if ($this->timeFilter) {
        //     $date = Carbon::now();
        //     switch ($this->timeFilter) {
        //         case '1_day':
        //             $date->subDays(1);
        //             break;
        //         case '7_day':
        //             $date->subDays(7);
        //             break;
        //         case '1_month':
        //             $date->subMonth();
        //             break;
        //         case '3_month':
        //             $date->subMonths(3);
        //             break;
        //         case '6_month':
        //             $date->subMonths(6);
        //             break;
        //         case '1_year':
        //             $date->subYear();
        //             break;
        //     }
        //     $query->whereDate('created_at', '>=', $date);
        // }
        if ($this->timeFilter) {
            $startDate = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $startDate = Carbon::now()->subDay()->startOfDay();
                    break;
                case '7_day':
                    $startDate = Carbon::now()->subDays(7)->startOfDay();
                    break;
                case '1_month':
                    $startDate = Carbon::now()->subMonth()->startOfDay();
                    break;
                case '3_month':
                    $startDate = Carbon::now()->subMonths(3)->startOfDay();
                    break;
                case '6_month':
                    $startDate = Carbon::now()->subMonths(6)->startOfDay();
                    break;
                case '1_year':
                    $startDate = Carbon::now()->subYear()->startOfDay();
                    break;
            }

            $query->whereDate('created_at', '<=', $startDate);
        }
        $zones = $query->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        foreach ($zones as $zone) {
            $zone->room_count = Room::where('zone_id', $zone->id)->count();
        }

        Log::info('Tìm thấy ' . $zones->count() . ' khu vực');
        $emptyZonesCount = Zone::where('user_id', auth()->id())
            ->whereDoesntHave('rooms')
            ->count();

        return view('livewire.zone-search', [
            'zones' => $zones,
            'emptyZonesCount' => $emptyZonesCount
        ]);
    }

    public function updatedSelectedZones($value)
    {
        $selectableZonesCount = $this->getSelectableZonesCount();
        $this->selectAll = count($this->selectedZones) === $selectableZonesCount;
    }
    public function getZoneImageUrl(Zone $zone): string
    {
        $image = $zone->images->first();
        return $image ? asset('assets/images/' . $image->filename) : asset('assets/images/properties-grid-08.jpg');
    }
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedZones = $this->getSelectableZones()->pluck('id')->toArray();
        } else {
            $this->selectedZones = [];
        }
    }
    private function getSelectableZones()
    {
        return Zone::where('user_id', auth()->id())
            ->whereDoesntHave('rooms');
    }

    private function getSelectableZonesCount()
    {
        return $this->getSelectableZones()->count();
    }
}
