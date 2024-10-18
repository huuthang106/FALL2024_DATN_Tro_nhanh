<?php

namespace App\Livewire;

use App\Models\CommentZones;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CommentUsers;
use Illuminate\Support\Facades\Auth;

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
        $comments = CommentZones::with('user')
            ->where('user_id', $this->commentedUserId)
            ->latest()
            ->paginate(2);

        return view('livewire.comments', compact('comments'));
    }
    public function deleteComment($commentId)
    {
        $comment = CommentZones::find($commentId);

        if ($comment && $comment->user_id == Auth::id()) {
            $comment->delete();
            $this->dispatch('showAlert', [
                'type' => 'success',
                'title' => 'Thành công!',
                'text' => 'Bình luận đã được xóa thành công.'
            ]);
        } else {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'title' => 'Lỗi!',
                'text' => 'Không thể xóa bình luận này.'
            ]);
        }
    }
}
