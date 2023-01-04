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
            'reference'       => $this->product->reference,
            'category'        => $this->product->category_id,
            'date bon'        => $this->bon->date_bon,
            'type bon'        => $this->bon->bon_type,
            'quantite'        => $this->amount,
            'reference bon'   => $this->bon->reference,
            'date de creation'=> $this->created_at,
        ];
    }
}


