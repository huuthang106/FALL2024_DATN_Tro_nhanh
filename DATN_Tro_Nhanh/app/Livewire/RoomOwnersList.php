<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;
use App\Models\PriceList;
use App\Models\Utility;
use Illuminate\Support\Facades\Auth;
use App\Services\RoomOwnersService;
use Carbon\Carbon;

class RoomOwnersList extends Component
{
    use WithPagination;
    public $selectedRooms = [];
    public $selectAll = false;
    public $search = '';
    public $sortBy = 'date_new_to_old';
    public $perPage = 10;
    public $roomCount;
    public $timeFilter = '';
    protected $roomOwnersService;
    protected $queryString = ['search', 'timeFilter'];
    public const Goitin = 2; // Đúng cú pháp



    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function updatingSortBy()
    // {
    //     $this->resetPage();
    // }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingFilterByDate()
    {
        $this->resetPage();
    }

    public function mount(RoomOwnersService $roomOwnersService)
    {
        $this->roomOwnersService = $roomOwnersService;
        $this->roomCount = Room::count(); // Đếm tất cả các phòng
    }

    public function getRoomImageUrl(Room $room): string
    {
        // Lấy tên file từ cột 'images'
        $imageFilename = $room->images;
    
        // Kiểm tra và tạo URL đầy đủ cho hình ảnh
        return $imageFilename ? asset('images/' . $imageFilename) : asset('assets/images/properties-grid-08.jpg');
    }

    public function render()
    {
        $user = Auth::user();
        $priceList = PriceList::where('status', self::Goitin)->get();
        $query = Room::query(); // Không cần lọc theo user_id

        if (!empty($this->search)) {
            $query->where(function ($q) {
                // Tìm kiếm theo tên hoặc địa chỉ
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });
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

            $query->whereDate('created_at', '<=', $startDate);
        }

        $rooms = $query->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.room-owners-list', [
            'rooms' => $rooms,
            'priceList' => $priceList,
            'user' => $user
        ]);
    }
 
    public function toggleRoom($roomId)
    {
        if (isset($this->selectedRooms[$roomId])) {
            unset($this->selectedRooms[$roomId]);
        } else {
            $this->selectedRooms[$roomId] = true;
        }
        $this->updateSelectAllState();
    }

    public function updateSelectAllState()
   {
       $totalRooms = Room::count(); // Đếm tất cả các phòng
       $selectedCount = count($this->selectedRooms);
       $this->selectAll = ($selectedCount === $totalRooms) && ($totalRooms > 0);
   }
   public function toggleSelectAll()
   {
       $rooms = Room::pluck('id')->toArray(); // Lấy tất cả ID phòng

       if (count($this->selectedRooms) < count($rooms)) {
           $this->selectedRooms = array_fill_keys($rooms, true);
           $this->selectAll = true;
       } else {
           $this->selectedRooms = [];
           $this->selectAll = false;
       }
   }
    public function deleteSelected()
    {
        $roomIds = array_keys(array_filter($this->selectedRooms));
        if (empty($roomIds)) {
            session()->flash('error', 'Vui lòng chọn ít nhất một phòng để xóa.');
            return;
        }

        // Thực hiện xóa các phòng đã chọn
        Room::whereIn('id', $roomIds)->delete();

        $this->selectedRooms = [];
        session()->flash('success', 'Các phòng đã chọn đã được xóa thành công.');
    }
    public function hydrate()
    {
        $this->selectedRooms = is_array($this->selectedRooms) ? array_filter($this->selectedRooms) : [];
    }
    public function updatedSelectedRooms($value, $key)
    {
        $this->updateSelectAllState();
    }
 
    public function getSelectedRoomsCount()
    {
        return count(array_filter($this->selectedRooms));
    }
    public function isRoomSelected($roomId)
    {
        return isset($this->selectedRooms[$roomId]) && $this->selectedRooms[$roomId];
    }
    
}
