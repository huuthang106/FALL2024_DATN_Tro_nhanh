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
    
    public function deleteSelectedBlogs($data)
    {
        $blogIds = $data['ids']; // Lấy danh sách ID blog đã chọn
        if (empty($blogIds)) {
            $this->dispatch('error', ['message' => 'Không có blog nào được chọn để xóa.']);// Thông báo lỗi nếu không có blog nào được chọn
            return;
        }

        // Thực hiện xóa các blog đã chọn
        $delete_blog=Blog::whereIn('id', $blogIds)->delete();

        $this->selectedBlogs = []; // Reset danh sách blog đã chọn
        $this->dispatch('blogs-deleted', ['message' => "Đã xóa thành công."]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function toggleBlog($blogId)
    {
        // Ví dụ: Thêm hoặc xóa blog khỏi danh sách đã chọn
        if (in_array($blogId, $this->selectedBlogs)) {
            $this->selectedBlogs = array_diff($this->selectedBlogs, [$blogId]);
        } else {
            $this->selectedBlogs[] = $blogId;
        }

        // Log hành động hoặc thực hiện các thao tác khác
        Log::info('Toggled blog:', ['id' => $blogId]);
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
