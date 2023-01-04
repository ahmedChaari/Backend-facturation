<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'user_id'     => $this->user->nom,
            'company_id'  => $this->company->name,
            'path_image'  => $this->path_image,
            'reference'   => $this->reference,
            'vendor_id'   => $this->vendor,
            'designation' => $this->designation,
            'prix_achat'  => $this->uprix_achat,
            'prix_vente'  => $this->prix_vente,
            'categories' => $this->categories,
            'unite'       => $this->unite,
            'code_bare'   => $this->code_bare,
            'stock_min'   => $this->stock_min,
            'tva_id'      => $this->tva,
            'actif'       => $this->actif,
            'rayon_a'     => $this->rayon_a,
            'rayon_b'     => $this->rayon_b,
            'deposit_id'  => $this->deposit,
            'quantite_initial' => $this->quantite_initial,
            'description'      => $this->description,

        ];
    }
}
