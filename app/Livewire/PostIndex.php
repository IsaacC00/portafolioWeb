<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public $search;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('name', 'LIKE','%'.$this->search.'%')->latest('id')->paginate(5);
        return view('livewire.post-index',compact('posts'));
    }
}
