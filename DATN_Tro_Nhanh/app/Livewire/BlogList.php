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
        // $blogs = Blog::with(['image', 'user'])->paginate(5); // Adjust the number per page as needed
        // return view('livewire.blog-list', compact('blogs'));
        $blogs = Blog::with(['image', 'user'])
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);

        return view('livewire.blog-list', compact('blogs'));
    }
}
