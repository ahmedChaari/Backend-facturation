<?php

namespace App\Http\Resources\Tva;

use Illuminate\Http\Resources\Json\JsonResource;

class TvaResource extends JsonResource
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
            'number' => $this->number,
           // 'company_id' => $this->company_id,
        ];
    }
}
