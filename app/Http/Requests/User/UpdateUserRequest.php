<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'nom'           => 'required',
            'prenom'        => 'required',
            'email'         => 'nullable|string|unique:users,email',
            'gender'        => 'required',
            'adresse'       => 'required',
            'pseudo'        => 'required',
            'deposit_id'    => 'nullable',
            'password'      => 'nullable|string|confirmed',
        ];
    }
}
