<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use Carbon\Carbon;
class TrashedRooms extends Component
{
    use WithPagination;

    public $search = '';
    public $timeFilter = ''; // Add timeFilter property
    public $perPage = 1; // Set the number of items per page
    public $sortBy = 'updated_at'; // Default to sorting by updated_at
    public $sortDirection = 'desc'; // Show newest first

    public function render()
    {
        $trashedRoomsQuery = Room::onlyTrashed();
    
        // Lọc theo thời gian
        if ($this->timeFilter) {
            $date = Carbon::now(); // Không cần sao chép, có thể sử dụng trực tiếp
            switch ($this->timeFilter) {
                case '1_day':
                    $trashedRoomsQuery->where('updated_at', '>=', $date->subDays(1));
                    break;
                case '7_day':
                    $trashedRoomsQuery->where('updated_at', '>=', $date->subDays(7));
                    break;
                case '1_month':
                    $trashedRoomsQuery->where('updated_at', '>=', $date->subMonth());
                    break;
                case '3_month':
                    $trashedRoomsQuery->where('updated_at', '>=', $date->subMonths(3));
                    break;
                case '6_month':
                    $trashedRoomsQuery->where('updated_at', '>=', $date->subMonths(6));
                    break;
                case '1_year':
                    $trashedRoomsQuery->where('updated_at', '>=', $date->subYear());
                    break;
            }
        }
    
        // Lọc theo từ khóa tìm kiếm
        if ($this->search) {
            $trashedRoomsQuery->where('title', 'like', '%' . $this->search . '%');
        }
    
        // Thực hiện truy vấn, sắp xếp theo updated_at giảm dần và phân trang
        $trashedRooms = $trashedRoomsQuery
            ->orderBy('updated_at', 'desc') // Sắp xếp theo updated_at giảm dần
            ->paginate($this->perPage);
    
        // Kiểm tra xem có phòng nào trong thùng rác không
        $hasData = $trashedRooms->isNotEmpty();
    
        return view('livewire.trashed-rooms', [
            'trashedRooms' => $trashedRooms,
            'hasData' => $hasData,
        ]);
    }
    


    private function getSortColumn()
    {
        return $this->sortBy; // Use sortBy directly
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when searching
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset pagination when changing time filter
    }

    public function updatedSortBy()
    {
        $this->resetPage(); // Reset pagination when sorting
    }

    public function getRoomImageUrl(Room $room): string
    {
        $image = $room->images->first();
        return $image ? asset('assets/images/' . $image->filename) : asset('assets/images/properties-grid-08.jpg');
    }
}
