<?php

namespace App\Http\Requests\Bon;

use Illuminate\Foundation\Http\FormRequest;

class BonRequest extends FormRequest
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
            'deposit_id'       => 'required',
            'description'      => 'nullable',
            'date_bon'         => 'required',
            'products'         => 'required',
        ];
    }
}
