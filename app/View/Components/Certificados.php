<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Certificados extends Component
{
    public $certificados;
    /**
     * Create a new component instance.
     */
    public function __construct($certificados)
    {
        $this->certificados=$certificados;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.certificados');
    }
}
