<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'email' => $this->email,
            'artist' => $this->artist,
            'image' => $this->image,
            'slug' => $this->slug,
            'image2' => $this->image2,
            'image3' => $this->image3,
            'image4' => $this->image4,
            'description' => $this->description,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'pais_id' => $this->pais
        ];
    }
}
