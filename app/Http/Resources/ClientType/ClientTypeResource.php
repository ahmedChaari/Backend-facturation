<?php

namespace App\Http\Resources\ClientType;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientTypeResource extends JsonResource
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
            'company_id' => $this->company,
        ];
    }
}
