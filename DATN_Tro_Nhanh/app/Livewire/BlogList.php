<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;

class BlogList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $blogs = Blog::with(['image', 'user'])->paginate(5); // Adjust the number per page as needed
        return view('livewire.blog-list', compact('blogs'));
    }
}
