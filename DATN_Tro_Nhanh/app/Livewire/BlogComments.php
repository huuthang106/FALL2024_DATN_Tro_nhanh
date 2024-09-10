<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;

class BlogComments extends Component
{
    use WithPagination;

    public $blog;

    public function mount($blogSlug)
    {
        $this->blog = Blog::where('slug', $blogSlug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.blog-comments', [
            'comments' => $this->blog->comments()->paginate(5), // Số lượng bình luận trên mỗi trang
        ]);
    }
}
