<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'email', 'image', 'image2', 'image3', 'image4', 'slug', 'artist', 'escuchando', 'description', 'facebook', 'instagram', 'twitter', 'pais_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function followings()
    {
        return $this->belongsToMany(User::class, 'users_follow', 'user', 'friend');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'users_follow', 'friend', 'user');
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'artist_id');
    }

    public function albums()
    {
        return $this->hasMany(Album::class, 'artist_id');
    }

    public function songs()
    {
        return $this->hasMany(Song::class, 'artist_id');
    }

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function following_playlists()
    {
        return $this->belongsToMany(Playlist::class, 'user_follow_playlist', 'user_id', 'playlist_id');
    }

    public function following_events()
    {
        return $this->belongsToMany(Event::class, 'user_follow_event', 'user_id', 'event_id');
    }
}
