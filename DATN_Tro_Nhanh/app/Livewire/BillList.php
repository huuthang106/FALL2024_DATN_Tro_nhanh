<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BillList extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 10; // Số lượng hóa đơn trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc
    public $status;

    public function render()
    {
        $userId = Auth::id();

        $query = Bill::where('creator_id', $userId)
            ->with('creator');

        // Tìm kiếm theo từ khóa
        if (!empty($this->search)) {
            if (!empty($this->search)) {
                $query->where(function ($q) {
                    // Bỏ điều kiện tìm kiếm theo invoice_number
                    $q->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhere('amount', 'like', '%' . $this->search . '%');
                });
            }
        }

        // Lọc theo khoảng thời gian
        if ($this->status) {
            $query->where('status', $this->status);
        }

        $bills = $query->paginate($this->perPage);

        return view('livewire.bill-list', compact('bills'));
    }

    // public function updatedTimeFilter()
    // {
    //     $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    // }
}
