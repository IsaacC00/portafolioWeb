<?php

namespace App\Observers;

use App\Models\Certificate;

class CertificateObserver
{
    /**
     * Handle the Certificate "created" event.
     */
    public function creating(Certificate $certificate): void
    {
        if (! \App::runningInConsole()) {
            $certificate->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Certificate "updated" event.
     */
    public function updated(Certificate $certificate): void
    {
        //
    }

    /**
     * Handle the Certificate "deleted" event.
     */
    public function deleted(Certificate $certificate): void
    {
        //
    }

    /**
     * Handle the Certificate "restored" event.
     */
    public function restored(Certificate $certificate): void
    {
        //
    }

    /**
     * Handle the Certificate "force deleted" event.
     */
    public function forceDeleted(Certificate $certificate): void
    {
        //
    }
}
