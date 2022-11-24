<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name'          => $this->name,
            'date_creation' => $this->date_creation,
            'ICE'           => $this->ICE,
            'fiscale'       => $this->fiscale,
            'registre_commerce' => $this->registre_commerce,
            'patent'        => $this->patent,
            'cnss'          => $this->cnss,
            'activite'      => $this->activite,
            'gerant'        => $this->gerant,
            'has_activated' =>  $this->has_activated ,
            'contact'       => $this->contact,
            'adresse'       => $this->adresse,
            'tel'           => $this->tel,
            'tel_mobile'    => $this->tel_mobile,
            'fax'           => $this->fax,
            'email'         => $this->email,
            'web'           => $this->web,
            'logo'          => $this->logo,
           // 'user'          =>$this->
        ];
    }
}
