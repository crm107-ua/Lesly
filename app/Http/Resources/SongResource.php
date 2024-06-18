<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
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
            'url' => $this->url,
            'name' => $this->name,
            'artista' => new UserResource($this->artist),
            'genero' => new GeneroResource($this->genero),
            'album' => new AlbumResource($this->album),
            'image' => $this->image,
            'estreno' => $this->estreno,
            'slug' => $this->slug,
            'letra' => $this->letra,
            'fondo' => $this->fondo,
            'video' => $this->video,
            'description' => $this->description
        ];
    }
}
