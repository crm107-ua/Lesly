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
        'id', 'url', 'name', 'image', 'estreno', 'slug', 'letra', 'fondo', 'video', 'description', 'artist_id', 'genero_id', 'album_id'
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

    /**
     * URL lista para el reproductor. En local convierte
     * https://lesly.carlosrobles.es/storage/songs/... en /storage/songs/...
     * sin tocar la base de datos.
     */
    public function playUrl()
    {
        return static::toLocalMediaUrl($this->attributes['url'] ?? '');
    }

    public static function toLocalMediaUrl($value)
    {
        if (!is_string($value) || $value === '') {
            return $value;
        }

        if (!in_array(request()->getHost(), ['127.0.0.1', 'localhost'], true)) {
            return $value;
        }

        if (!preg_match('#^https?://#i', $value)) {
            return $value;
        }

        $path = parse_url($value, PHP_URL_PATH);

        return (is_string($path) && $path !== '') ? $path : $value;
    }
}
