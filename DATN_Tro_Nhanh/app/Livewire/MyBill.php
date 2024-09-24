<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
class MyBill extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at'; // Column to sort by
    public $sortDirection = 'desc'; // Đặt mặc định là sắp xếp mới nhất lên đầu
    public $timeFilter = '';
    public function render()
    {
        // Lấy danh sách giao dịch của người dùng hiện tại
        $transactions = Transaction::where('user_id', Auth::id())
            ->when($this->timeFilter, function($query) {
                $startDate = now();
                switch ($this->timeFilter) {
                    case '1_day':
                        $startDate = now()->subDays(1);
                        break;
                    case '7_day':
                        $startDate = now()->subDays(7);
                        break;
                    case '1_month':
                        $startDate = now()->subMonth();
                        break;
                    case '3_month':
                        $startDate = now()->subMonths(3);
                        break;
                    case '6_month':
                        $startDate = now()->subMonths(6);
                        break;
                    case '1_year':
                        $startDate = now()->subYear();
                        break;
                }
                return $query->where('created_at', '>=', $startDate);
            })
            ->where(function($query) {
                // Tìm kiếm theo mô tả hoặc ngày tạo
                $query->where('description', 'like', '%' . $this->search . '%')
                      ->orWhere('created_at', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('livewire.my-bill', ['transactions' => $transactions]);
    }

    public function getSortColumn()
    {
        switch ($this->sortBy) {
            case 'name':
                return 'description';
            case 'price_low_to_high':
                return 'added_funds';
            case 'price_high_to_low':
                return 'added_funds';
            case 'date_old_to_new':
                return 'created_at';
            case 'date_new_to_old': // Thêm điều kiện cho mới nhất
            default:
                return 'created_at'; // Mặc định là sắp xếp theo ngày tạo
        }
    }

    public function getSortDirection()
    {
        // Đảm bảo rằng dữ liệu mới nhất sẽ luôn được hiển thị lên đầu tiên
        return in_array($this->sortBy, ['price_high_to_low', 'date_old_to_new']) ? 'asc' : 'desc';
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset trang khi tìm kiếm
    }

    public function updatedSortBy()
    {
        $this->resetPage(); // Reset trang khi thay đổi cách sắp xếp
    }
}