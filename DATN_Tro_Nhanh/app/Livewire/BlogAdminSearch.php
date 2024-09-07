<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog; // Giả sử bạn có model Blog
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class BlogAdminSearch extends Component
{
    use WithPagination;

    public $search = ''; // Biến tìm kiếm
    public $perPage = 5; // Số lượng hiển thị mỗi trang
    public $orderBy = 'created_at'; // Sắp xếp theo ngày tạo
    public $orderAsc = false; // Sắp xếp giảm dần

    // Khi từ khóa tìm kiếm thay đổi, reset lại trang hiện tại
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Render dữ liệu và trả về view
    public function render()
    {
        Log::info('Searching for blogs with: ' . $this->search);

        $blogs = Blog::where('title', 'like', '%' . $this->search . '%')
                     ->orWhere('description', 'like', '%' . $this->search . '%')
                     ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                     ->paginate($this->perPage);

        Log::info('Found ' . $blogs->count() . ' blogs');

        return view('livewire.blog-admin-search', [
            'blogs' => $blogs
        ]);
    }
}
