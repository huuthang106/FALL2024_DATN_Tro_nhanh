<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PriceList;
use Carbon\Carbon;

class PriceListAdminSearch extends Component
{
    // public function render()
    // {
    //     return view('livewire.price-list-admin-search');
    // }
    use WithPagination;

    public $search = '';
    public $timeFilter = ''; // Mặc định là không lọc
    public $orderBy = 'created_at'; // Mặc định sắp xếp theo ngày tạo mới nhất
    public $orderAsc = false; // Giảm dần
    public $perPage = 10;

    public function updatingSearch()
    {
        // Reset pagination khi tìm kiếm
        $this->resetPage();
    }

    public function render()
    {
        $query = PriceList::query();
        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $now = Carbon::now();

            switch ($this->timeFilter) {
                case "1_day":
                    $startDate = $now->subDays(1);
                    break;
                case '7_day':
                    $startDate = $now->subDays(7);
                    break;
                case '3_month':
                    $startDate = $now->subMonths(3);
                    break;
                case '6_month':
                    $startDate = $now->subMonths(6);
                    break;
                case '1_year':
                    $startDate = $now->subYear();
                    break;
                default:
                    $startDate = null;
            }

            if ($startDate) {
                $query->where('created_at', '>=', $startDate);
            }
        }
        // Điều kiện tìm kiếm mở rộng
        if ($this->search) {
            $query->where(function ($q) {
                // Tìm kiếm theo description, price, location name và duration_day
                $q->where('description', 'like', '%' . $this->search . '%')
                    ->orWhere('price', 'like', '%' . $this->search . '%')
                    ->orWhereHas('location', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('duration_day', 'like', '%' . $this->search . '%');
            });
        }

        // Sắp xếp theo ngày tạo mới nhất mặc định
        $query->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc');

        $priceLists = $query->paginate($this->perPage);

        return view('livewire.price-list-admin-search', [
            'priceLists' => $priceLists
        ]);
    }
}
