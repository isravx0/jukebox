<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use App\Models\Song;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
{
    $genres = Genre::all();
    return view('genre.index', ['genres' => $genres]);
}

public function showSongs($genreId)
{
    // Find the genre by its ID
    $genre = Genre::findOrFail($genreId);

    // Retrieve songs that belong to the specified genre ID
    $songs = Song::where('genres_id', $genre->id)->get();

    // Pass the genre and songs to the view
    return view('genre.show', compact('genre', 'songs'));
}


}
