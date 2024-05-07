<?php

namespace App\Providers;

use App\Models\Certificate;
use App\Models\Information;
use App\Models\Post;
use App\Models\Testimonial;
use App\Observers\CertificateObserver;
use App\Observers\InformationObserver;
use App\Observers\PostObserver;
use App\Observers\TestimonialObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
 
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
        Certificate::observe(CertificateObserver::class);
        Testimonial::observe(TestimonialObserver::class);
        Information::observe(InformationObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
