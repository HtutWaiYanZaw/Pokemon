<?php

namespace App\Http\Resources\weakness;

use Illuminate\Http\Resources\Json\JsonResource;

class WeaknessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
            'name' => $this->name,
            'photo' => asset('storage/' . $this->photo),
        ];

    }
}
