<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog; // Giả sử bạn có model Blog
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class BlogSearch extends Component
{
    use WithPagination;

    public $search = ''; // Biến tìm kiếm
    public $perPage = 5; // Phân trang, hiển thị 5 blog mỗi trang
    public $orderBy = 'created_at'; // Sắp xếp theo cột created_at (ngày tạo)
    public $orderAsc = false; // Sắp xếp giảm dần

    // Khi từ khóa thay đổi, reset lại trang hiện tại
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Định nghĩa hàm render() để hiển thị dữ liệu
    public function render()
    {
        Log::info('Searching for blogs with: ' . $this->search);

        // Truy vấn blog theo title và description, không phụ thuộc vào user đăng nhập
        $blogs = Blog::where('title', 'like', '%' . $this->search . '%')
                     ->orWhere('description', 'like', '%' . $this->search . '%')
                     ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                     ->paginate($this->perPage);

        Log::info('Found ' . $blogs->count() . ' blogs');

        // Trả về view với dữ liệu
        return view('livewire.blog-admin-search', [
            'blogs' => $blogs
        ]);
    }
}
