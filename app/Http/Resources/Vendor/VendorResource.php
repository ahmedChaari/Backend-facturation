<?php

namespace App\Http\Resources\Vendor;

use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
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
            'id'          => $this->id,
            'company_id'  => $this->company->name,
            'designation' => $this->designation,
            'RC'          => $this->RC,
            'tel'         => $this->tel,
            'fax'         => $this->fax,
            'ICE'         => $this->ICE,
            'ville'       => $this->ville,
            'email'       => $this->email,
            'adresse'     => $this->adresse,
        ];
    }
}
