<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;

class BlogList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        // Lấy các bài viết mới nhất
        $blogs = Blog::with(['user'])
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày mới nhất
            ->paginate(5); // Hiển thị 5 bài
    
        // Lấy 3 bài viết có lượt xem cao nhất
        $topViewedBlogs = $this->getTopViewsBlogs(3); // Lấy 3 bài viết nhiều view nhất
    
        // Truyền cả hai loại dữ liệu vào view
        return view('livewire.blog-list', compact('blogs', 'topViewedBlogs'));
    }
    
    public function getTopViewsBlogs($limit = 3)
    {
        return Blog::orderBy('view', 'desc') // Sắp xếp theo lượt xem (view) từ cao xuống thấp
            ->take($limit) // Giới hạn số lượng bài viết
            ->get(); // Lấy dữ liệu
    }
    
    
}
