<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Laravel\Socialite\Facades\Socialite;
use App\Services\Spotify\Provider;

use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Spotify\SpotifyExtendSocialite;


class EventServiceProvider extends ServiceProvider {
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
    public function boot() {
        parent::boot();

        // Spotify 
        $this->app->make('events')->listen(
            SocialiteWasCalled::class,
            SpotifyExtendSocialite::class
        );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool {
        return false;
    }
}
