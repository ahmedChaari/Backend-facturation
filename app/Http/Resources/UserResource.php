<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'nom'           => $this->nom,
            'prenom'        => $this->prenom,
            'email'         => $this->email,
            'sexe'          => $this->gender,
            'adresse'       => $this->adresse,
            'pseudo'        => $this->pseudo,
            'role'          => $this->role->name,
            'CRÉÉ PAR'      => $this->user,
            'DÉPOT'         => $this->deposit->name,
            'DATE CRÉATION' => $this->created_at->format('m/d/Y'),
        ];
    }
}
