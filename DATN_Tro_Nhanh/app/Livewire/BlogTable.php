<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use Carbon\Carbon;

class BlogTable extends Component
{
    use WithPagination;

    public $search = '';
    public $timeFilter = '';
    protected $queryString = ['search', 'timeFilter'];

    public function updatingSearch()
    {
        $this->resetPage();  // Reset pagination khi tìm kiếm
    }

    public function updatingTimeFilter()
    {
        $this->resetPage();  // Reset pagination khi lọc
    }

    public function render()
    {
        $query = Blog::query();

        // Tìm kiếm theo title hoặc description
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $date = Carbon::now();
            switch ($this->timeFilter) {
                case '1_day':
                    $query->where('created_at', '>=', $date->subDay());
                    break;
                case '7_day':
                    $query->where('created_at', '>=', $date->subWeek());
                    break;
                case '3_month':
                    $query->where('created_at', '>=', $date->subMonths(3));
                    break;
                case '6_month':
                    $query->where('created_at', '>=', $date->subMonths(6));
                    break;
                case '1_year':
                    $query->where('created_at', '>=', $date->subYear());
                    break;
            }
        }

        // Sắp xếp theo ngày tạo giảm dần
        $blogs = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.blog-table', [
            'blogs' => $blogs
        ]);
    }
}
