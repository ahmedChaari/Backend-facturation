<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function storeClient(UserRequest $request)
    {
        $company  = Auth::user()->company_id;
        // il faut chercher la milleur method 
        $user     = Auth::user()->id;
            $user = User::create([
                'nom'        => $request['nom'],
                'prenom'     => $request['prenom'], 
                'email'      => $request['email'],
                'gender'     => $request['gender'],
                'adresse'    => $request['adresse'],
                'pseudo'     => $request['pseudo'],
                'role_id'    => $request['role_id'],
                'user_id'    => $user,
                'deposit_id' => $request['deposit_id'],
                'company_id' => $company,
                'password'   => bcrypt($request['password']),
            ]);
      
        return response([
            $user,
            'message'    => 'create the client of restaurant !',
            ], 200);   
    }
}
