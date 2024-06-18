<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadistica extends Model
{
    protected $table = 'estadisticas';

    protected $fillable = [
        'id', 'user_id', 'song_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
