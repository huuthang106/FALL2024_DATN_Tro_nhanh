<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Utility;
use Carbon\Carbon;



class UtilityAdminSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'date_new_to_old';
    protected $queryString = ['search', 'sortBy', 'perPage'];
    public $timeFilter = '';
    public $perPage = 10;

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingFilterByDate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Utility::query()->orderBy('created_at', 'desc');

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $startDate = Carbon::now();  // Thời gian bắt đầu của bộ lọc
        
            \Log::info("Current date before filter: " . Carbon::now()->toDateTimeString());
        
            // Xử lý bộ lọc thời gian
            switch ($this->timeFilter) {
                case '1_day':
                    $startDate = Carbon::now()->subDay()->startOfDay();  // Bắt đầu của ngày hôm qua
                    break;
                case '7_day':
                    $startDate = Carbon::now()->subDays(7)->startOfDay();  // Bắt đầu của 7 ngày trước
                    break;
                case '1_month':
                    $startDate = Carbon::now()->subMonth()->startOfDay();  // Bắt đầu của 1 tháng trước
                    break;
                case '3_month':
                    $startDate = Carbon::now()->subMonths(3)->startOfDay();  // Bắt đầu của 3 tháng trước
                    break;
                case '6_month':
                    $startDate = Carbon::now()->subMonths(6)->startOfDay();  // Bắt đầu của 6 tháng trước
                    break;
                case '1_year':
                    $startDate = Carbon::now()->subYear()->startOfDay();  // Bắt đầu của 1 năm trước
                    break;
            }
        
            \Log::info("Lọc dữ liệu trước ngày: " . $startDate->toDateTimeString());
        
            // Lọc dữ liệu với created_at nhỏ hơn ngày bắt đầu
            $query->whereDate('created_at', '<=', $startDate);
        
            // Log số lượng bản ghi sau khi lọc
            \Log::info("Số lượng bản ghi sau khi lọc: " . $query->count());
        }
        
        if ($this->search) {
            $query->where(function ($q) {
                // Tìm kiếm theo title của phòng (room)
                $q->orWhereHas('room', function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%');
                });
            });
        }

        // Sắp xếp kết quả từ mới nhất đến cũ nhất
        $query->orderBy('created_at', 'desc');

        $utilities = $query->paginate($this->perPage);

        return view('livewire.utility-admin-search', [
            'utilities' => $utilities
        ]);
    }
}
