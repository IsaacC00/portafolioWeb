<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageTestimonial extends Component
{
    
    public $testimonial;
    
    public function __construct($testimonial)
    {
        $this->testimonial=$testimonial;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-testimonial');
    }
}
