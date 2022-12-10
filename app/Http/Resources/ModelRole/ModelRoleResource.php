<?php

namespace App\Http\Resources\ModelRole;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelRoleResource extends JsonResource
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
            'company_id'   => $this->company->name,
            'menu_id'      => $this->menu,
            'sous_menu_id' => $this->sousMenu,
            'role_id'      => $this->role->name,
            'consulter'    => $this->consulter,
            'ajouter'      => $this->ajouter,
            'modifier'     => $this->modifier,
            'valider'      => $this->valider,
            'supprimer'    => $this->supprimer,
            'imprimer'     => $this->imprimer,
            'exporter'     => $this->exporter,
            'annuler'      => $this->annuler,
        ];
    }
}
