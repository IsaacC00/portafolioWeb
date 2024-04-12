<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Acerca extends Component
{
    public $information;

    public function __construct($information)
    {
        $this->information = $information;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.acerca');
    }
}
