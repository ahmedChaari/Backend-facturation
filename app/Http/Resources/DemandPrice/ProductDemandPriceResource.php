<?php

namespace App\Http\Resources\DemandPrice;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDemandPriceResource extends JsonResource
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
            'id'            => $this->id,
            'product'       => $this->product,
            'demandPrice'   => $this->demandPrice,
            'amount'        => $this->amount,
            'price'         => $this->price,
        ];
    }
}
