<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class NavCategory extends Component
{
    public function render()
    {
        $category = Category::all();
        return view('livewire.nav-category',compact('category'));
    }
}
