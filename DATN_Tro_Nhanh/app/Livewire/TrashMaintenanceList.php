<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MaintenanceRequest; // Thay đổi theo model của bạn
use Carbon\Carbon; // Thêm Carbon để xử lý ngày tháng

class TrashMaintenanceList extends Component
{
    use WithPagination;

    public $search = '';
    public $timeFilter = ''; // Thêm thuộc tính timeFilter

    protected $listeners = ['deleteSelected']; // Đăng ký listener cho sự kiện deleteSelected

    public function render()
    {
        $query = MaintenanceRequest::onlyTrashed(); // Lấy các bản ghi đã xóa

        // Tìm kiếm theo tiêu đề hoặc tên người dùng
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo thời gian
        if ($this->timeFilter) {
            $this->applyTimeFilter($query);
        }

        // Kiểm tra xem có dữ liệu nào không
        $trashedMaintenances = $query->paginate(10); // Số lượng bản ghi trên mỗi trang

        return view('livewire.trash-maintenance-list', [
            'trashedMaintenances' => $trashedMaintenances,
        ]);
    }
   
    // Phương thức để áp dụng lọc theo thời gian
    protected function applyTimeFilter($query)
    {
        $now = Carbon::now();

        switch ($this->timeFilter) {
            case '1_day':
                $query->where('created_at', '>=', $now->subDay());
                break;
            case '7_day':
                $query->where('created_at', '>=', $now->subDays(7));
                break;
            case '1_month':
                $query->where('created_at', '>=', $now->subMonth());
                break;
            case '3_month':
                $query->where('created_at', '>=', $now->subMonths(3));
                break;
            case '6_month':
                $query->where('created_at', '>=', $now->subMonths(6));
                break;
            case '1_year':
                $query->where('created_at', '>=', $now->subYear());
                break;
        }
    }
    public function restoreSelectedMaintenances($selectedIds)
    {
        if (!empty($selectedIds)) {
            MaintenanceRequest::withTrashed()->whereIn('id', $selectedIds)->restore(); // Khôi phục các bản ghi đã chọn
            session()->flash('message', 'Các yêu cầu đã được khôi phục thành công.'); // Thông báo thành công
        } else {
            session()->flash('error', 'Không có yêu cầu nào được chọn để khôi phục.'); // Thông báo lỗi
        }
    }
    public function deleteSelectedMaintenances($selectedIds)
    {
        if (!empty($selectedIds)) {
            MaintenanceRequest::onlyTrashed()->whereIn('id', $selectedIds)->forceDelete(); // Xóa các bản ghi đã chọn
            session()->flash('message', 'Các yêu cầu đã được xóa thành công.'); // Thông báo thành công
        } else {
            session()->flash('error', 'Không có yêu cầu nào được chọn để xóa.'); // Thông báo lỗi
        }
    }
}