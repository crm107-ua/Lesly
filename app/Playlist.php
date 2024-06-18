<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlist';

    protected $fillable = [
        'name', 'slug', 'image', 'description', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function playlists_tienen_cancion()
    {
        return $this->belongsToMany(Song::class, 'songs_playlist', 'song_id', 'playlist_id');
    }

    public function canciones_en_playlist()
    {
        return $this->belongsToMany(Song::class, 'songs_playlist', 'playlist_id', 'song_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow_playlist', 'playlist_id', 'user_id');
    }
}
