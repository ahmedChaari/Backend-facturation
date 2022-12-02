<?php

namespace App\Http\Resources\Agence;

use Illuminate\Http\Resources\Json\JsonResource;

class AgenceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'libelle' => $this->libelle,
            'company_id' => $this->company_id,
        ];
    }
}
