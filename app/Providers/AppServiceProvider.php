<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot() {
        Inertia::share([
            'spotifyToken' => function () {
                $user = User::where('email', 'noahtelussa@gmail.com')->first();
                return $user ? $user->spotify_token : null;
            },
        ]);
    }
}
