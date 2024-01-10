<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => asset('storage/' . $this->photo),
            'price' => $this->price,
            'qty' => $this->qty,
            'hp' => $this->hp,
            'status' => $this->status,
            'super_type_name' => $this->super_type_name,
            'sub_type_name' => $this->sub_type_name,
            'type_name' => $this->type_name,
            'type_photo' => asset('storage/' . $this->type_photo),
            'resistance_name' => $this->resistance_name,
            'resistance_photo' => asset('storage/' . $this->resistance_photo),
            'weakness_name' => $this->weakness_name,
            'weakness_photo' => asset('storage/' . $this->weakness_photo),
        ];
    }
}
