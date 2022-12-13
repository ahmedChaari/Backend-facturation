<?php

namespace App\Http\Resources\ModelRole;

use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleMResource extends JsonResource
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
            'name'       => $this->name,
            'modelRoles' =>  ModelRoleResource::collection($this->modelRoles),
        ];
           
    }
}
