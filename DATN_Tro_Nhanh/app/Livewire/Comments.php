<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;

class Comments extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Chọn giao diện phân trang nếu dùng Bootstrap

    public function render()
    {
        // Lấy danh sách bình luận với phân trang
        $comments = Comment::with('user')->latest()->paginate(2);

        return view('livewire.comments', compact('comments'));
    }
}
