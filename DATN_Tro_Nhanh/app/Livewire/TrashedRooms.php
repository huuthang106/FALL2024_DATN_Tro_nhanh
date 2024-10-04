<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Services\RoomOwnersService;

class TrashedRooms extends Component
{
    use WithPagination;

    public $search = '';
    public $timeFilter = ''; // Add timeFilter property
    public $perPage = 8; // Set the number of items per page
    public $sortBy = 'updated_at'; // Default to sorting by updated_at
    public $sortDirection = 'desc'; // Show newest first
    public $selectedRooms = [];
    public $selectAll = false;

    protected $listeners = ['roomSelected' => 'updateSelectAll'];


    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedRooms = $this->getTrashedRoomIds();
        } else {
            $this->selectedRooms = [];
        }
        $this->updateDeleteButtonState();
    }

    public function updateDeleteButtonState()
    {
        $this->dispatch('updateDeleteButton', ['visible' => $this->hasSelectedRooms]);
    }
    public function updateSelectAll()
    {
        $this->selectAll = count($this->selectedRooms) === count($this->getTrashedRoomIds());
        $this->dispatch('selectedRoomsUpdated');
    }
    private function getTrashedRoomIds()
    {
        return $this->getFilteredQuery()->pluck('id')->map(fn($id) => (string) $id)->toArray();
    }
    public function updatedSelectedRooms($value)
    {
        $this->selectAll = count($this->selectedRooms) === count($this->getTrashedRoomIds());
        $this->updateDeleteButtonState();
    }
    public function getHasSelectedRoomsProperty()
    {
        return count($this->selectedRooms) > 0;
    }
    private function getFilteredQuery()
    {
        $query = Room::onlyTrashed();

        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
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
    public function deleteSelected()
    {
        // Thay vì xóa trực tiếp, chúng ta sẽ gửi một sự kiện để hiển thị SweetAlert2
        $this->dispatch('confirmDelete');
    }
    public function confirmDelete()
    {
        $rooms = Room::onlyTrashed()->whereIn('id', $this->selectedRooms)->get();

        foreach ($rooms as $room) {
            foreach ($room->images as $image) {
                $imagePath = public_path('assets/images/' . $image->filename);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $image->delete();
            }
            $room->forceDelete();
        }

        $this->selectedRooms = [];
        $this->selectAll = false;
        $this->dispatch('showAlert', [
            'type' => 'success',
            'message' => 'Phòng trọ đã chọn đã được xóa vĩnh viễn.'
        ]);

        $this->dispatch('refreshComponent');
    }
    public function restoreSelected()
    {
        $roomOwnersService = new RoomOwnersService();
        $roomOwnersService->restoreMultipleRooms($this->selectedRooms);

        $this->selectedRooms = [];
        $this->selectAll = false;
        $this->dispatch('showAlert', [
            'type' => 'success',
            'message' => 'Phòng trọ đã chọn đã được khôi phục.'
        ]);

        $this->dispatch('refreshComponent');
    }
    public function render()
    {
        $trashedRoomsQuery = $this->getFilteredQuery();

        $trashedRooms = $trashedRoomsQuery
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);

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
