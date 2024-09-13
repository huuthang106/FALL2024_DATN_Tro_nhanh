<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;

class Comments extends Component
{
    use WithPagination;

    public $commentedUserId; // Thêm thuộc tính để lưu trữ commented_user_id

    protected $paginationTheme = 'bootstrap'; // Chọn giao diện phân trang nếu dùng Bootstrap

    public function mount($commentedUserId)
    {
        $this->commentedUserId = $commentedUserId; // Gán giá trị commented_user_id khi khởi tạo component
    }

    public function render()
    {
        // Lấy danh sách bình luận với phân trang và lọc theo commented_user_id
        $comments = Comment::with('user')
            ->where('commented_user_id', $this->commentedUserId)
            ->latest()
            ->paginate(2);

        return view('livewire.comments', compact('comments'));
    }
}