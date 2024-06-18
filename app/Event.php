<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $dates = array('fecha');

    protected $fillable = [
        'id', 'name', 'artist_id', 'description', 'texto', 'slug', 'fecha', 'image', 'image2', 'image3', 'image4', 'stream'
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
        return $this->belongsTo(User::class, 'artist_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow_event', 'event_id', 'user_id');
    }

    public function eventos_tienen_cancion()
    {
        return $this->belongsToMany(Song::class, 'songs_event', 'song_id', 'event_id');
    }

    public function canciones_en_evento()
    {
        return $this->belongsToMany(Song::class, 'songs_event', 'event_id', 'song_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'event_id');
    }
}
