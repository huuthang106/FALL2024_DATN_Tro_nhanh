<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Services\BlogServices;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TrashBlog extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 4; // Số lượng blog trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc
    public $selectedBlogs = []; // Biến lưu trữ các blog được chọn

    protected $listeners = ['restoreSelectedBlogs', 'forceDeleteSelectedBlogs'];
    
    // Hàm để xóa vĩnh viễn các blog đã chọn
    public function forceDeleteSelectedBlogs()
    {
        Log::info('Blogs to be permanently deleted:', $this->selectedBlogs);
        if (count($this->selectedBlogs) > 0) {
            Blog::withTrashed()->whereIn('id', $this->selectedBlogs)->forceDelete();
            $this->selectedBlogs = []; // Reset lại sau khi xóa
            $this->dispatch('blogs-force-deleted', ['message' => 'Các blog đã chọn đã được xóa vĩnh viễn']);
        }
    }
    // Hàm để khôi phục các blog đã chọn
    public function restoreSelectedBlogs()
    {
        Log::info('Selected Blogs:', $this->selectedBlogs);
        if (count($this->selectedBlogs) > 0) {
            Blog::withTrashed()->whereIn('id', $this->selectedBlogs)->restore();
            $this->selectedBlogs = []; // Reset lại sau khi khôi phục
            $this->dispatch('blog-restored', ['message' => 'Các blog đã chọn đã được khôi phục thành công']);
        }
    }

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
    
        return view('livewire.trash-blog',compact('trashedBlogs'));
    }
    public function updatedSearch()
    {
        $this->resetPage(); // Reset trang khi thay đổi từ khóa tìm kiếm
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    }
}
