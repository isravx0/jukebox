<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    
    /**
     * Get the genres associated with the song.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_song');
    }
}
