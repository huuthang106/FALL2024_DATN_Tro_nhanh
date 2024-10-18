<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\CommentBlogs;
use Illuminate\Support\Facades\Auth;

class BlogComments extends Component
{
    use WithPagination;

    public $blog;

    public function mount($blogSlug)
    {
        $this->blog = Blog::where('slug', $blogSlug)->firstOrFail(); // Sử dụng model Blog để lấy blog
    }

    public function render()
    {
        return view('livewire.blog-comments', [
            'comments' => CommentBlogs::where('blog_id', $this->blog->id)
                ->orderBy('created_at', 'desc')
                ->paginate(3),
        ]);
    }
    // Giới hạn cmt
    public function deleteComment($commentId)
    {
        try {
            $comment = CommentBlogs::where('id', $commentId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            // Xóa cứng comment
            $comment->forceDelete();

            $this->dispatch('commentDeleted', ['message' => 'Bình luận đã được xóa thành công.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $this->dispatch('commentDeleteFailed', ['message' => 'Không tìm thấy bình luận hoặc bạn không có quyền xóa bình luận này.']);
        } catch (\Exception $e) {
            $this->dispatch('commentDeleteFailed', ['message' => 'Có lỗi xảy ra khi xóa bình luận.']);
        }
    }

}
