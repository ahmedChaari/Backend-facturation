<?php

namespace App\Http\Resources\Bon;

use Illuminate\Http\Resources\Json\JsonResource;

class BonTransfertResource extends JsonResource
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
            'id'               => $this->id,
            'reference'        => $this->reference,
            'company_id'       => $this->company->name,
            'date_bon'         => $this->date_bon,
            'description'      => $this->description,
            'valid'            => $this->valid,
            'bon_type'         => $this->bon_type,
            'Create with user' => $this->user->nom,
            'products'         => $this->products,
        ];
    }
}
