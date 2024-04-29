<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('song.index', ['songs' => $songs]);
    }

    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('song.show', ['song' => $song]);
    }

}
