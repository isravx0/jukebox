<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    /**
     * Get the songs associated with the genre.
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class, 'genre_song');
    }
}
