<?php

namespace App\Observers;

use App\Models\Testimonial;

class TestimonialObserver
{
    /**
     * Handle the Testimonial "created" event.
     */
    public function creating(Testimonial $testimonial): void
    {
        if (! \App::runningInConsole()) {
            $testimonial->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Testimonial "updated" event.
     */
    public function updated(Testimonial $testimonial): void
    {
        //
    }

    /**
     * Handle the Testimonial "deleted" event.
     */
    public function deleted(Testimonial $testimonial): void
    {
        //
    }

    /**
     * Handle the Testimonial "restored" event.
     */
    public function restored(Testimonial $testimonial): void
    {
        //
    }

    /**
     * Handle the Testimonial "force deleted" event.
     */
    public function forceDeleted(Testimonial $testimonial): void
    {
        //
    }
}
