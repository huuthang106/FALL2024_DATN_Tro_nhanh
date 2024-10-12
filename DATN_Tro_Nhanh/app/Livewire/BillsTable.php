<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BillsTable extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 5; // Số lượng hóa đơn trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc
    public $selectedBills = []; // Biến lưu trữ các hóa đơn được chọn

    // Hàm để xóa các hóa đơn đã chọn
    //  public function deleteSelectedBills()
    //  {
    //      if (count($this->selectedBills) > 0) {
    //          Log::info('Selected Bills:', $this->selectedBills);
    //          Bill::whereIn('id', $this->selectedBills)->delete();
    //          $this->selectedBills = []; // Reset lại sau khi xóa
    //          $this->dispatch('bill-deleted', ['message' => 'Các hóa đơn đã chọn đã được xóa thành công']);
    //      }
    //  }

    public function deleteBill($billId)
    {
        $bill = Bill::find($billId);
        if ($bill) {
            $bill->delete();
            $this->dispatch('bill-deleted', ['message' => 'Hóa đơn đã được xóa thành công']);
        }
    }

    public $startDate;
    // public $selectedBills = [];
    protected $queryString = ['search', 'perPage', 'timeFilter'];
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
        // Sắp xếp hóa đơn từ mới đến cũ
        $query->orderBy('created_at', 'desc');
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
    public function deleteSelectedBills()
    {
        Bill::whereIn('id', $this->selectedBills)->delete();
        $this->selectedBills = [];
        $this->dispatch('bills-deleted', ['message' => 'Các hóa đơn đã chọn đã được xóa thành công']);
    }
}
