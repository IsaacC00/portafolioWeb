<?php

namespace App\Observers;

use App\Models\Information;

class InformationObserver
{
    /**
     * Handle the Information "created" event.
     */
    public function creating(Information $information): void
    {
        if (! \App::runningInConsole()) {
            $information->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Information "updated" event.
     */
    public function updated(Information $information): void
    {
        //
    }

    /**
     * Handle the Information "deleted" event.
     */
    public function deleted(Information $information): void
    {
        //
    }

    /**
     * Handle the Information "restored" event.
     */
    public function restored(Information $information): void
    {
        //
    }

    /**
     * Handle the Information "force deleted" event.
     */
    public function forceDeleted(Information $information): void
    {
        //
    }
}
