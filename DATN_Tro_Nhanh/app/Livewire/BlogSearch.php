<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogSearch extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 10; // Số lượng blog trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc
    public $selectedBlogs = []; // Biến lưu trữ các blog được chọn
    public $startDate;
    protected $queryString = ['search', 'perPage', 'timeFilter'];
    // Hàm để xóa các blog đã chọn
    // public function deleteSelectedBlogs()
    // {
    //     if (count($this->selectedBlogs) > 0) {
    //         Log::info('Selected Blogs:', $this->selectedBlogs);
    //         Blog::whereIn('id', $this->selectedBlogs)->delete();
    //         $this->selectedBlogs = []; // Reset lại sau khi xóa
    //         $this->dispatch('blog-deleted', ['message' => 'Các thông báo đã chọn đã được xóa thành công']);
    //     }
    // }
    public function deleteSelectedBlogs()
    {
        Blog::whereIn('id', $this->selectedBlogs)->delete();
        $this->selectedBlogs = [];
        $this->dispatch('blogs-deleted', ['message' => 'Các Blog đã chọn đã được xóa thành công']);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingTimeFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        Log::info('Đang tìm kiếm blog với từ khóa: "' . $this->search . '"');

        $userId = Auth::id();
        $query = Blog::where('user_id', $userId);

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Áp dụng bộ lọc thời gian nếu được đặt
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

        $query->orderByDesc('created_at');

        $blogs = $query->paginate($this->perPage);

        return view('livewire.blog-search', compact('blogs'));
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    }
}
