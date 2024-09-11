<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use Carbon\Carbon;

class BlogSearch extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $perPage = 10; // Số lượng blog trên mỗi trang
    public $timeFilter = ''; // Khoảng thời gian lọc

    public function render()
    {
        $query = Blog::query()
            ->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $date = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $date = $date->subDays(1);
                    break;
                case '7_day':
                    $date = $date->subDays(7);
                    break;
                case '1_month':
                    $date = $date->subMonth();
                    break;
                case '3_month':
                    $date = $date->subMonths(3);
                    break;
                case '6_month':
                    $date = $date->subMonths(6);
                    break;
                case '1_year':
                    $date = $date->subYear();
                    break;
            }
            // Sử dụng chỉ 1 trong 2 `created_at` hoặc `updated_at` để tránh điều kiện không mong muốn
            $query->where('created_at', '>=', $date);
        }

        $blogs = $query->paginate($this->perPage);

        return view('livewire.blog-search', compact('blogs'));
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    }
}
