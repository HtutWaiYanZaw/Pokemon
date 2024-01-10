<?php

namespace App\Http\Resources\subtype;

use Illuminate\Http\Resources\Json\JsonResource;

class SubTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return[
        //     'name' => $request->name,
        //     // 'photo' => $request->photo,
        // ];
    }
}
