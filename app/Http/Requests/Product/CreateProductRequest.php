<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'path_image'      => 'required',
            'vendor_id'       => 'required',
            'designation'     => 'nullable',
            'prix_achat'      => 'nullable|numeric',
            'prix_vente'      => 'nullable|numeric',
          //  'category_id'     => 'required',
            'unite'           => 'required|in:kg,metre,littre,piece',
            'code_bare'       => 'required',
            'stock_min'       => 'required',
            'tva_id'          => 'required',
            'actif'           => 'required|boolean',
            'rayon_a'         => 'nullable',
            'rayon_b'         => 'nullable',
            'deposit_id'      => 'required',
            'quantite_initial'=> 'required|numeric',
            'description'     => 'nullable',
        ];
    }
}
