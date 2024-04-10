<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    // To make any change in the playlist
    public function edit(Playlist $playlist)
    {
        return view('playlist.edit', compact('playlist'));
    }

    //Change the name of a playlist
    public function update(Request $request, Playlist $playlist)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:playlist,name,'.$playlist->id,
        ]);

        $playlist->update($data);

        return redirect()->route('playlist.index')->with('success', 'Playlist updated successfully.');
    }


    // Destroy-delete a playlist
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlist.index')->with('success', 'Playlist deleted successfully.');
    }

    // To display the songs in a playlist
    public function showAddSongsForm(Playlist $playlist)
    {
        $songs = Song::all(); // Fetch all songs from the database
        return view('playlist.add', compact('playlist', 'songs'));
    }

    // To add  songs to a playlist
    public function addSongsToPlaylist(Request $request, Playlist $playlist)
    {
        $request->validate([
            'songs' => 'required|array',
            'songs.*' => [
                'distinct', // Ensure each song ID is unique
                Rule::exists('songs', 'id')->where(function ($query) use ($playlist) {
                    // Ensure each song ID exists and is not already in the playlist
                    $query->whereNotIn('id', $playlist->songs->pluck('id')->toArray());
                }),
            ],
        ]);

        $songsToAdd = $request->input('songs');

        // Attach only the new songs to the playlist
        $playlist->songs()->attach($songsToAdd);

        return redirect()->route('playlist.show', $playlist)->with('success', 'Songs added to playlist successfully.');
    }




    public function addSongs(Request $request, Playlist $playlist)
    {
        // Validate the request data
        $request->validate([
            'songs' => 'required|array',
            'songs.*' => 'exists:songs,id',
        ]);

        // Attach the selected songs to the playlist
        $playlist->songs()->attach($request->input('songs'));

        // Redirect back with a success message
        return redirect()->route('playlist.index')->with('success', 'Songs added to playlist successfully.');
    }

    public function show(Playlist $playlist)
    {
        // Eager load the songs associated with the playlist
        $playlist->load('songs');

        return view('playlist.show', compact('playlist'));
    }
}
