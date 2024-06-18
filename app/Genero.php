<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'generos';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'image', 'slug'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];


    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
