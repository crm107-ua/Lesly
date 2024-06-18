<?php

namespace App\Http\Resources;

use App\User;
use App\Song;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'artista' => new UserResource($this->artist),
            'estreno' => $this->estreno,
            'descripcion' => $this->descripcion,
            'image' => $this->image,
            'slug' => $this->slug
        ];
    }
}
