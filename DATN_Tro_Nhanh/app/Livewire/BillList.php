<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;

class BillList extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 10; // Số lượng hóa đơn trên mỗi trang
    public $status; // Trạng thái hóa đơn
    public $selectedBill; // Hóa đơn được chọn để chỉnh sửa
    public $title; // Tiêu đề yêu cầu
    public $description; // Nội dung yêu cầu

    public function render()
    {
        $userId = Auth::id();

        $query = Bill::where('creator_id', $userId)
            ->with('creator');

        // Tìm kiếm theo từ khóa
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('amount', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo trạng thái
        if ($this->status) {
            $query->where('status', $this->status);
        }

        // Sắp xếp theo thời gian tạo mới nhất
        $query->orderBy('created_at', 'desc');

        $bills = $query->paginate($this->perPage);

        return view('livewire.bill-list', compact('bills'));
    }

    public function editBill($billId)
    {
        $this->selectedBill = Bill::find($billId);
        $this->title = $this->selectedBill->title; // Giả sử bạn có trường title
        $this->description = $this->selectedBill->description;
        $this->dispatch('show-edit-modal'); // Gọi sự kiện để hiển thị modal
    }

    public function updateBill()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $bill = Bill::find($this->selectedBill->id);

        // Kiểm tra điều kiện trước khi cập nhật
        if ($bill->status != 1) {
            session()->flash('error', 'Bạn không thể chỉnh sửa hóa đơn này.');
            return;
        }

        $bill->title = $this->title;
        $bill->description = $this->description;
        $bill->save();

        $this->dispatch('hide-edit-modal'); // Ẩn modal
        session()->flash('message', 'Hóa đơn đã được cập nhật thành công.');
    }

    public function deleteBill($billId)
    {
        Bill::destroy($billId);
        session()->flash('message', 'Hóa đơn đã được xóa thành công.');
    }
}
