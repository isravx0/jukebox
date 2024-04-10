<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'playlist';
    protected $fillable = [
        'name',
    ];

    /**
     * Get the songs associated with the playlist.
     */
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}
