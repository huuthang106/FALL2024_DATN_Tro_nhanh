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
    

    // Hàm để xóa các blog đã chọn
    public function deleteSelectedBlogs()
    {
        if (count($this->selectedBlogs) > 0) {
            Log::info('Selected Blogs:', $this->selectedBlogs);
            Blog::whereIn('id', $this->selectedBlogs)->delete();
            $this->selectedBlogs = []; // Reset lại sau khi xóa
            $this->dispatch('blog-deleted', ['message' => 'Các thông báo đã chọn đã được xóa thành công']);
        }
    }

    

    public function render()
    {
        $userId = Auth::id();

        $query = Blog::where('user_id', $userId);

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }
        // $query = Blog::query()
        //     ->where(function ($q) {
        //         $q->where('title', 'like', '%' . $this->search . '%')
        //           ->orWhere('description', 'like', '%' . $this->search . '%');
        //     });

        // Lọc theo khoảng thời gian
        if ($this->timeFilter) {
            $date = Carbon::now()->copy(); // Tạo một bản sao mới của Carbon
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

        $blogs = $query->paginate($this->perPage);

        return view('livewire.blog-search', compact('blogs'));
    }

    public function updatedTimeFilter()
    {
        $this->resetPage(); // Reset trang khi thay đổi khoảng thời gian
    }
}
