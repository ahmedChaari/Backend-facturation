<?php

namespace App\Http\Resources\DemandPrice;

use Illuminate\Http\Resources\Json\JsonResource;

class DemandPriceResource extends JsonResource
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
            'id'         => $this->id,
            'company_id' => $this->company,
            'user_id'    => $this->user,
            'vendor_id'  => $this->vendor,
            'products'   => $this->products,
            'date_demand_price' => $this->date_demand_price,
        ];
    }
}
