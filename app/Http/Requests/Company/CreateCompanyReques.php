<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyReques extends FormRequest
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
            'name'          => 'required|unique:companies,name',
            'date_creation' => 'required',
            'ICE'           => 'required',
            'fiscale'       => 'required',
            'registre_commerce' => 'required',
            'patent'        => 'required',
            'cnss'          => 'required',
            'activite'      => 'required',
            'gerant'        => 'required',
            'contact'       => 'required',
            'adresse'       => 'required',
            'tel'           => 'required',
            'tel_mobile'    => 'required',
            'fax'           => 'required',
            'email'         => 'required',
            'web'           => 'required',
            'logo'          => 'required',
        ];
    }
}
