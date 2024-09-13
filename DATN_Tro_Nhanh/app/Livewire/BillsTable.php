<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BillsTable extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 5; // Số lượng hóa đơn trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc

    public function render()
    {
        // Lấy user hiện tại
        $userId = Auth::id();

        // Xây dựng truy vấn để lọc hóa đơn theo payer_id của user hiện tại
        $query = Bill::where('payer_id', $userId);

        // Lọc theo từ khóa tìm kiếm trong description hoặc payer_id
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('description', 'like', '%' . $this->search . '%')
                  ->orWhere('payer_id', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $date = Carbon::now()->copy(); // Tạo một bản sao mới của Carbon
            switch ($this->timeFilter) {
                case '1_day':
                    $date->subDays(1);
                    break;
                case '7_day':
                    $date->subDays(7);
                    break;
                case '1_month':
                    $date->subMonth();
                    break;
                case '3_month':
                    $date->subMonths(3);
                    break;
                case '6_month':
                    $date->subMonths(6);
                    break;
                case '1_year':
                    $date->subYear();
                    break;
            }
            $query->where('created_at', '>=', $date);
        }

        // Phân trang và trả về kết quả
        $bills = $query->paginate($this->perPage);

        return view('livewire.bills-table', compact('bills'));
    }

    public function updatedPerPage()
    {
        $this->resetPage(); // Reset trang khi thay đổi số lượng kết quả trên trang
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    }
}
