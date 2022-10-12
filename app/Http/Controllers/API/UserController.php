<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function listUsers(Request $request,$company)
  {
    $query    =  $request->get('search');
    $role     =  $request->get('role');
    $depot    =  $request->get('depot');

        if(isset($depot) && isset($query) && isset($role) ){
          echo 'touuuuuuuuuuuuuuuuu';
        }elseif(isset($depot) && isset($query)){
          echo 'depot    search';
        }elseif(isset($depot) && isset($role)){
          echo 'role           depot';
        }elseif(isset($query) && isset($role)){
          echo 'role           serch';
        }elseif(isset($query)) {
            echo 'search';
        }elseif(isset($role) && !isset($query)){
            echo 'role';
        }elseif(isset($depot) && !isset($query) && !isset($role)){
            echo 'depot';
        }
          
      
       
  }

    public function storeClient(UserRequest $request)
    {
      //  $company  = Auth::user()->company_id;

        $userId     = Auth::user()->id;
        $user       = User::create([
                'nom'        => $request['nom'],
                'prenom'     => $request['prenom'], 
                'email'      => $request['email'],
                'gender'     => $request['gender'],
                'adresse'    => $request['adresse'],
                'pseudo'     => $request['pseudo'],
                'role_id'    => $request['role_id'],
                'user_id'    => $userId,
                'deposit_id' => $request['deposit_id'],
              //  'company_id' => $company,
                'password'   => bcrypt($request['password']),
            ]);



          //  $comp = $request->tags;
            //if (empty($comp)){}else{                        
                
            $companyArray = explode("," ,$request->companies);
            $user->companies()->attach($companyArray);
      
        return response([
            $user,
            'message'    => 'create a new client of company !',
            ], 200);   
    }
}
