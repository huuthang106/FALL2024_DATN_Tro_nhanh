<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Services\BlogServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class TrashBlog extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 4; // Số lượng blog trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc

    public function render()
    {
        $query = Blog::onlyTrashed(); // Lấy các blog đã xóa
    
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }
    
        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $date = Carbon::now()->copy();
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
    
        $trashedBlogs = $query->paginate($this->perPage);
    
        return view('livewire.trash-blog', [
            'trashedBlogs' => $trashedBlogs, // Đảm bảo biến này được truyền đến view
        ]);
    }
    public function updatedSearch()
{
    $this->resetPage(); // Reset trang khi thay đổi từ khóa tìm kiếm
}

public function updatedTimeFilter()
{
    $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
}
public function forceDeleteBlog($id)
{
    $blog = Blog::withTrashed()->findOrFail($id);
    $blog->forceDelete(); // Xóa vĩnh viễn blog
    
    $this->dispatch('showAlert', [
        'type' => 'success',
        'title' => 'Thành công!',
        'message' => 'Blog đã được xóa vĩnh viễn!'
    ]); // Gửi sự kiện để hiển thị SweetAlert
}
}
