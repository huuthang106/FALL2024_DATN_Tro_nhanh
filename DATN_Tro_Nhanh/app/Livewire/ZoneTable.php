<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Services\ZoneServices;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class ZoneTable extends Component
{
    use WithPagination;

    public $search = '';
    public $timeFilter = '';
    public $perPage = 5;
    public $sortBy = 'updated_at';
    public $sortDirection = 'desc';
    public $selectedZones = [];
    public $selectAll = false;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['zoneSelected' => 'updateSelectAll'];
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
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedZones = $this->getTrashedZoneIds();
        } else {
            $this->selectedZones = [];
        }
        $this->updateDeleteButtonState();
    }

    public function updateDeleteButtonState()
    {
        $this->dispatch('updateDeleteButton', ['visible' => $this->hasSelectedZones]);
    }

    public function updateSelectAll()
    {
        $this->selectAll = count($this->selectedZones) === count($this->getTrashedZoneIds());
        $this->dispatch('selectedZonesUpdated');
    }

    private function getTrashedZoneIds()
    {
        return $this->getFilteredQuery()->pluck('id')->map(fn($id) => (string) $id)->toArray();
    }

    public function updatedSelectedZones($value)
    {
        $this->selectAll = count($this->selectedZones) === count($this->getTrashedZoneIds());
        $this->dispatch('updateDeleteButton');
    }
    public function getHasSelectedZonesProperty()
    {
        return count($this->selectedZones) > 0;
    }

    public function deleteSelected()
    {
        $this->dispatch('confirmDelete');
    }

    public function confirmDelete()
    {
        $zones = Zone::onlyTrashed()->whereIn('id', $this->selectedZones)->get();

        foreach ($zones as $zone) {
            // Xóa hình ảnh liên quan đến khu trọ
            foreach ($zone->images as $image) {
                $imagePath = public_path('assets/images/' . $image->filename);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $image->delete();
            }

            // Xóa vĩnh viễn khu trọ
            $zone->forceDelete();
        }

        $this->selectedZones = [];
        $this->selectAll = false;
        $this->dispatch('showAlert', [
            'type' => 'success',
            'message' => 'Khu trọ đã chọn đã được xóa vĩnh viễn.'
        ]);

        $this->dispatch('refreshComponent');
    }
    // public function confirmDelete()
    // {
    //     $zones = Zone::onlyTrashed()->whereIn('id', $this->selectedZones)->get();
    //     $deletedZoneNames = [];

    //     foreach ($zones as $zone) {
    //         // Lưu tên khu trọ trước khi xóa
    //         $deletedZoneNames[] = $zone->name;

    //         // Xóa hình ảnh liên quan đến khu trọ
    //         foreach ($zone->images as $image) {
    //             $imagePath = public_path('assets/images/' . $image->filename);
    //             if (File::exists($imagePath)) {
    //                 File::delete($imagePath);
    //             }
    //             $image->delete();
    //         }

    //         // Xóa vĩnh viễn khu trọ
    //         $zone->forceDelete();
    //     }

    //     $count = count($deletedZoneNames);

    //     // Tạo thông báo
    //     Notification::create([
    //         'user_id' => Auth::id(),
    //         'data' => 'Đã xóa vĩnh viễn ' . $count . ' khu trọ: ' . implode(', ', $deletedZoneNames),
    //         'type' => 'Xóa vĩnh viễn khu trọ',
    //         'is_read' => false
    //     ]);

    //     $this->selectedZones = [];
    //     $this->selectAll = false;
    //     $this->dispatch('showAlert', [
    //         'type' => 'success',
    //         'message' => 'Khu trọ đã chọn đã được xóa vĩnh viễn.'
    //     ]);

    //     $this->dispatch('refreshComponent');
    // }
    public function restoreSelected()
    {
        $zoneServices = new ZoneServices();
        $zoneServices->restoreMultipleZones($this->selectedZones);

        $this->selectedZones = [];
        $this->selectAll = false;
        $this->dispatch('showAlert', [
            'type' => 'success',
            'message' => 'Khu trọ đã chọn đã được khôi phục.'
        ]);
        $this->dispatch('refreshComponent');
    }
    // public function restoreSelected()
    // {
    //     $zoneServices = new ZoneServices();
    //     $restoredZones = $zoneServices->restoreMultipleZones($this->selectedZones);

    //     // Lấy tên của các khu trọ đã được khôi phục
    //     $restoredZoneNames = Zone::whereIn('id', $this->selectedZones)->pluck('name')->toArray();
    //     $count = count($restoredZoneNames);

    //     // Tạo thông báo
    //     Notification::create([
    //         'user_id' => Auth::id(),
    //         'data' => 'Đã khôi phục thành công ' . $count . ' khu trọ: ' . implode(', ', $restoredZoneNames),
    //         'type' => 'Khôi phục khu trọ',
    //         'is_read' => false
    //     ]);

    //     $this->selectedZones = [];
    //     $this->selectAll = false;
    //     $this->dispatch('showAlert', [
    //         'type' => 'success',
    //         'message' => 'Khu trọ đã chọn đã được khôi phục.'
    //     ]);
    //     $this->dispatch('refreshComponent');
    // }
    private function getFilteredQuery()
    {
        $query = Zone::onlyTrashed();

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

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

            $query->whereDate('updated_at', '<=', $startDate);
        }

        return $query;
    }

    public function render()
    {
        $trashedZones = $this->getFilteredQuery()
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.zone-table', [
            'trashedZones' => $trashedZones,
        ]);
    }
    // public function render()
    // {
    //     $trashedZonesQuery = Zone::onlyTrashed();
    //     if ($this->timeFilter) {
    //         $startDate = Carbon::now();  // Thời gian bắt đầu của bộ lọc

    //         // \Log::info("Current date before filter: " . Carbon::now()->toDateTimeString());

    //         // Xử lý bộ lọc thời gian
    //         switch ($this->timeFilter) {
    //             case '1_day':
    //                 $startDate = Carbon::now()->subDay()->startOfDay();  // Bắt đầu của ngày hôm qua
    //                 break;
    //             case '7_day':
    //                 $startDate = Carbon::now()->subDays(7)->startOfDay();  // Bắt đầu của 7 ngày trước
    //                 break;
    //             case '1_month':
    //                 $startDate = Carbon::now()->subMonth()->startOfDay();  // Bắt đầu của 1 tháng trước
    //                 break;
    //             case '3_month':
    //                 $startDate = Carbon::now()->subMonths(3)->startOfDay();  // Bắt đầu của 3 tháng trước
    //                 break;
    //             case '6_month':
    //                 $startDate = Carbon::now()->subMonths(6)->startOfDay();  // Bắt đầu của 6 tháng trước
    //                 break;
    //             case '1_year':
    //                 $startDate = Carbon::now()->subYear()->startOfDay();  // Bắt đầu của 1 năm trước
    //                 break;
    //         }

    //         // \Log::info("Lọc dữ liệu trước ngày: " . $startDate->toDateTimeString());

    //         // Lọc dữ liệu với updated_at nhỏ hơn ngày bắt đầu
    //         $trashedZonesQuery->whereDate('updated_at', '<=', $startDate);

    //         // Log số lượng bản ghi sau khi lọc
    //         // \Log::info("Số lượng bản ghi sau khi lọc: " . $trashedZonesQuery->count());
    //     }

    //     // Thực hiện truy vấn, sắp xếp theo ngày cập nhật mới nhất trước và phân trang
    //     $trashedZones = $trashedZonesQuery
    //         ->where('name', 'like', '%' . $this->search . '%')
    //         ->orderBy('updated_at', 'desc') // Sắp xếp theo ngày cập nhật mới nhất
    //         ->paginate($this->perPage);

    //     return view('livewire.zone-table', [
    //         'trashedZones' => $trashedZones,
    //     ]);
    // }
    public function getZoneImageUrl(Zone $zone): string
    {
        $image = $zone->images->first();
        return $image ? asset('assets/images/' . $image->filename) : asset('assets/images/properties-grid-08.jpg');
    }
}
