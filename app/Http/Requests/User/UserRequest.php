<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'         => 'required|string|unique:users,email',
            'gender'        => 'required',
            'adresse'       => 'required',
            'pseudo'        => 'required',
            'role'          => 'required',
            'user_id'       => 'required',
            'deposit_id'    => 'required',
            'company'       => 'required',
            'password'      => 'required|string|confirmed',
        ];
    }
}
