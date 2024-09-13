<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Acreage;
use Carbon\Carbon;
use App\Services\AcreageAdminService;
class AcreageTable extends Component
{
  
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 5; // Số lượng bản ghi trên mỗi trang
    public $timeFilter = ''; // Bộ lọc khoảng thời gian

    protected $queryString = ['search', 'perPage', 'timeFilter'];
    public function render()
    {
        $query = Acreage::query();

        // Áp dụng tìm kiếm
        if ($this->search) {
            $query->where('name', 'like', "%{$this->search}%")
                  ->orWhere('min_size', 'like', "%{$this->search}%")
                  ->orWhere('max_size', 'like', "%{$this->search}%");
        }

        // Áp dụng lọc theo thời gian
        if ($this->timeFilter) {
            $startDate = now();
            switch ($this->timeFilter) {
                case '1_day':
                    $startDate = $startDate->subDay();
                    break;
                case '7_day':
                    $startDate = $startDate->subDays(7);
                    break;
                case '3_month':
                    $startDate = $startDate->subMonths(3);
                    break;
                case '6_month':
                    $startDate = $startDate->subMonths(6);
                    break;
                case '1_year':
                    $startDate = $startDate->subYear();
                    break;
            }
            $query->where('created_at', '>=', $startDate);
        }

        return view('livewire.acreage-table', [
            'acreages' => $query->paginate(10),
        ]);
    }public function deleteAcreage($id)
    {
        $acreage = Acreage::find($id);
    
        if ($acreage) {
            $acreage->forceDelete(); // Ensures the record is permanently deleted
            session()->flash('success', 'Diện tích đã được xóa thành công.');
        } else {
            session()->flash('error', 'Diện tích không tồn tại.');
        }
        
        // Refresh the page or reset pagination
        $this->resetPage(); 
    }
    
}
