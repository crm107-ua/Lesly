<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Critica extends Model
{
    protected $table = 'critica';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id', 'song_id', 'user_id', 'texto', 'fecha', 'estrellas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
