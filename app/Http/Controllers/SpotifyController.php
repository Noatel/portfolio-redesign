<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\SongUpdated;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class SpotifyController extends Controller {

    public function redirectToSpotify() {
        return Socialite::driver('spotify')->scopes(['user-read-currently-playing', 'user-read-recently-played'])->redirect();
    }

    public function handleSpotifyCallback() {
        $spotifyUser = Socialite::driver('spotify')->user();

        // get current user logged in
        $user = Auth::user();
        if (isset($user)) {
            $user->spotify_id = $spotifyUser->id;
            $user->spotify_token = $spotifyUser->token;
            $user->spotify_refresh_token = $spotifyUser->refreshToken;
            $user->save();
        }

        return redirect('/dashboard');
    }

    private function refreshSpotifyToken($user) {
        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $user->spotify_refresh_token,
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $user->spotify_token = $data['access_token'];
            if (isset($data['refresh_token'])) {
                $user->spotify_refresh_token = $data['refresh_token'];
            }
            $user->save();
            return $data['access_token'];
        }

        return null;
    }


    public function getCurrentlyPlaying() {
        $user = User::where('email', 'noahtelussa@gmail.com')->first();
        $spotifyToken = $user->spotify_token;

        $response = Http::withToken($spotifyToken)
            ->get('https://api.spotify.com/v1/me/player/currently-playing');

        if ($response->status() === 401) {
            // Token expired, refresh it
            $spotifyToken = $this->refreshSpotifyToken($user);
            if ($spotifyToken) {
                $response = Http::withToken($spotifyToken)
                    ->get('https://api.spotify.com/v1/me/player/currently-playing');
            } else {
                return response()->json(['error' => 'Unable to refresh token'], 401);
            }
        }

        broadcast(new SongUpdated($response->json()));

        return response()->json($response->json());
    }

    public function getLastPlayed() {
        $user = User::where('email', 'noahtelussa@gmail.com')->first();
        $spotifyToken = $user->spotify_token;

        $response = Http::withToken($spotifyToken)
            ->get('https://api.spotify.com/v1/me/player/recently-played?limit=1');

        if ($response->status() === 401) {
            // Token expired, refresh it
            $spotifyToken = $this->refreshSpotifyToken($user);
            if ($spotifyToken) {
                $response = Http::withToken($spotifyToken)
                    ->get('https://api.spotify.com/v1/me/player/recently-played?limit=1');
            } else {
                return response()->json(['error' => 'Unable to refresh token'], 401);
            }
        }

        return response()->json($response->json());
    }
}
