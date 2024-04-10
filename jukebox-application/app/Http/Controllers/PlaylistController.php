<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    //
    public function index()
    {
        $playlists = Playlist::all();
        return view('playlist.index', ['playlists' => $playlists]);
    }

    public function create()
    {
        return view('playlist.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:playlist',
        ]);

        $newPlaylist = Playlist::create($data);

        return redirect()->route('playlist.index')->with('success', 'Playlist created successfully.');
    }
}
