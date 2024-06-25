<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LastProject extends Component
{
    /**
     * Create a new component instance.
     */
    public $last;
    public function __construct($last)
    {
        $this->last = $last;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.last-project');
    }
}
