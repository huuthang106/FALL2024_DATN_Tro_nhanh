<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Models\CommentBlogs;
use Illuminate\Support\Facades\Auth;

class BlogComments extends Component
{
    use WithPagination;

    public $blog;
    public $statusMessage;
    protected $listeners = ['commentDeleted' => '$refresh'];

    public function mount($blogSlug)
    {
        $this->blog = Blog::where('slug', $blogSlug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.blog-comments', [
            'comments' => CommentBlogs::where('blog_id', $this->blog->id)
                ->orderBy('created_at', 'desc')
                ->paginate(3),
        ]);
    }


    // public function deleteComment($commentId)
    // {
    //     try {
    //         // Tìm và xóa bình luận
    //         $comment = CommentBlogs::findOrFail($commentId);
    //         $comment->forceDelete();
    
    //         // Cập nhật biến trạng thái với thông báo thành công
    //         $this->statusMessage = [
    //             'type' => 'success',
    //             'message' => 'Bình luận đã được xóa thành công.'
    //         ];
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //         // Thông báo lỗi nếu không tìm thấy bình luận
    //         $this->statusMessage = [
    //             'type' => 'error',
    //             'message' => 'Không tìm thấy bình luận này.'
    //         ];
    //     } catch (\Exception $e) {
    //         // Thông báo lỗi tổng quát
    //         $this->statusMessage = [
    //             'type' => 'error',
    //             'message' => 'Có lỗi xảy ra khi xóa bình luận.'
    //         ];
    //     }
    // }
    
    
    
    
}


