<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class DashboardController extends Controller {
    public function index() {
        $user = User::where('email', 'noahtelussa@gmail.com')->first();
        $spotifyToken = $user->spotify_token;

        return Inertia::render('Dashboard', [
            'spotifyToken' => $spotifyToken,
        ]);
    }
}
