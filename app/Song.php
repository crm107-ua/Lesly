<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    protected $table = 'songs';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id', 'url', 'name', 'image', 'estreno', 'slug', 'letra', 'fondo', 'video', 'artist_id', 'genero_id', 'album_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function artist()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function reproducir()
    {
        return $this->belongsToMany(User::class, 'estadisticas', 'song_id', 'user_id');
    }

    public function criticas()
    {
        return $this->hasMany(Critica::class, 'song_id');
    }
}
