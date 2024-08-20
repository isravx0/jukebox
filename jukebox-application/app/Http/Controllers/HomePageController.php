<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Playlist;
use App\Models\Song;
class HomePageController extends Controller
{
    public function index()
    {
        // Fetch the last two genres from the database
        $genres = Genre::all();

        // Fetch the last two playlists from the database
        $playlists = Playlist::latest()->limit(2)->get();

        // Fetch the last two songs from the database
        $songs = Song::latest()->limit(2)->get();

        return view('layout.index', compact('genres', 'playlists', 'songs'));
    }
}
