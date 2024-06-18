<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaisResource extends JsonResource
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
            'code' => $this->code,
            'continent_code' => $this->continent_code,
            'name' => $this->name,
            'iso3' => $this->iso3,
            'number' => $this->number,
            'full_name' => $this->full_name
        ];
    }
}
