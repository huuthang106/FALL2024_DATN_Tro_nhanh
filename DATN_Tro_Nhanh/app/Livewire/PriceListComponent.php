<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PriceList;
use Carbon\Carbon;

class PriceListComponent extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 5; // Số lượng bản ghi trên mỗi trang
    public $timeFilter = ''; // Bộ lọc khoảng thời gian

    protected $queryString = ['search', 'perPage', 'timeFilter'];

    public function render()
    {
        // Xây dựng truy vấn để lọc dữ liệu
        $query = PriceList::query();

        // Lọc theo từ khóa tìm kiếm
        if ($this->search) {
            $query->where('price', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $dateFrom = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $dateFrom = Carbon::now()->subDay();
                    break;
                case '7_day':
                    $dateFrom = Carbon::now()->subDays(7);
                    break;
                case '3_month':
                    $dateFrom = Carbon::now()->subMonths(3);
                    break;
                case '6_month':
                    $dateFrom = Carbon::now()->subMonths(6);
                    break;
                case '1_year':
                    $dateFrom = Carbon::now()->subYear();
                    break;
            }
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        // Phân trang dữ liệu
        $priceLists = $query->paginate($this->perPage);

        return view('livewire.price-list-component', compact('priceLists'));
    }

    // Reset trang khi thay đổi số lượng bản ghi trên mỗi trang
    public function updatedPerPage()
    {
        $this->resetPage();
    }
}

