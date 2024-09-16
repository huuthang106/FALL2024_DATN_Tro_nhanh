<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Room;

class RoomPagination extends Component
{
    use WithPagination;

    public $search = '';
    public $timeFilter = '';
    public $perPage = 10; // Số lượng phòng mỗi trang
    const hienthidulieu = 1;
    public function render()
    {
        $query = Room::query();
        $query->where('status', self::hienthidulieu);
        // Tìm kiếm theo nhiều trường
        if ($this->search) {
            $query->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $dateFilter = now();

            switch ($this->timeFilter) {
                case '1_day':
                    $dateFilter->subDay();
                    break;
                case '7_day':
                    $dateFilter->subDays(7);
                    break;
                case '3_month':
                    $dateFilter->subMonths(3);
                    break;
                case '6_month':
                    $dateFilter->subMonths(6);
                    break;
                case '1_year':
                    $dateFilter->subYear();
                    break;
            }

            $query->where('created_at', '>=', $dateFilter);
        }

        $rooms = $query->paginate($this->perPage);

        return view('livewire.room-pagination', [
            'rooms' => $rooms,
        ]);
    }

}
