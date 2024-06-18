<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'artista' => new UserResource($this->user),
            'description' => $this->description,
            'texto' => $this->texto,
            'slug' => $this->slug,
            'fecha' => $this->fecha,
            'image' => $this->image,
            'image2' => $this->image2,
            'image3' => $this->image3,
            'image4' => $this->image4,
            'stream' => $this->stream,
            'canciones' => SongResource::collection($this->canciones_en_evento)
        ];
    }
}
