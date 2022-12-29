<?php

namespace App\Http\Resources\Bon;

use Illuminate\Http\Resources\Json\JsonResource;

class HistoriqueBonResource extends JsonResource
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
            'id'              => $this->id,
            'product_id'      => $this->product_id,
            'bon_id'          => $this->bon_id,
        ];
    }
}


