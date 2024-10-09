<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blog; // Giả sử bạn có model Blog
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class BlogAdminSearch extends Component
{
    use WithPagination;

    public $search = ''; // Biến tìm kiếm
    public $sortBy = 'date_new_to_old';
    public $perPage = 5; // Số lượng hiển thị mỗi trang
    protected $queryString = ['search', 'sortBy', 'perPage'];
    public $timeFilter = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatingFilterByDate()
    {
        $this->resetPage();
    }

    // Render dữ liệu và trả về view
    public function render()
    {
        Log::info('Searching for blogs with: ' . $this->search);
        $query = Blog::query()->orderBy('created_at', 'desc');
        
        if ($this->search) {
            $query->where(function ($q) {
                // Tìm kiếm theo tên chủ thẻ hoặc số tài khoản
                $q->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->timeFilter) {
        $startDate = Carbon::now();  // Thời gian bắt đầu của bộ lọc
    
        \Log::info("Current date before filter: " . Carbon::now()->toDateTimeString());
    
        // Xử lý bộ lọc thời gian
        switch ($this->timeFilter) {
            case '1_day':
                $startDate = Carbon::now()->subDay()->startOfDay();  // Bắt đầu của ngày hôm qua
                break;
            case '7_day':
                $startDate = Carbon::now()->subDays(7)->startOfDay();  // Bắt đầu của 7 ngày trước
                break;
            case '1_month':
                $startDate = Carbon::now()->subMonth()->startOfDay();  // Bắt đầu của 1 tháng trước
                break;
            case '3_month':
                $startDate = Carbon::now()->subMonths(3)->startOfDay();  // Bắt đầu của 3 tháng trước
                break;
            case '6_month':
                $startDate = Carbon::now()->subMonths(6)->startOfDay();  // Bắt đầu của 6 tháng trước
                break;
            case '1_year':
                $startDate = Carbon::now()->subYear()->startOfDay();  // Bắt đầu của 1 năm trước
                break;
        }
    
        \Log::info("Lọc dữ liệu trước ngày: " . $startDate->toDateTimeString());
    
        // Lọc dữ liệu với created_at nhỏ hơn ngày bắt đầu
        $query->whereDate('created_at', '<=', $startDate);
    
        // Log số lượng bản ghi sau khi lọc
        \Log::info("Số lượng bản ghi sau khi lọc: " . $query->count());
        }
        
        $query->orderBy('created_at', 'desc');

        $blogs = $query->paginate($this->perPage);

        Log::info('Found ' . $blogs->count() . ' blogs');

        return view('livewire.blog-admin-search', [
            'blogs' => $blogs
        ]);
    }
}
