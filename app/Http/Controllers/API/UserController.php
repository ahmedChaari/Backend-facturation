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

    // serch for all search name and role and depot
        if(isset($depot) && isset($query) && isset($role) ){
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
          $query->where('company_id', $company);
            })
            ->where( function($q) use ($query) {
              $q->where('nom', 'LIKE',"%{$query}%");
              $q->orWhere('prenom','LIKE', "%{$query}%");
              })  
              ->whereHas('role', function ($query) use($role) {
                $query->where('name', $role);
            }) 
              ->whereHas('deposit', function ($query) use($depot) {
                $query->where('name', $depot);
                })
            ->paginate(10));
        return $users;
         // serch for all search name  and depot
        }elseif(isset($depot) && isset($query)){
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
          $query->where('company_id', $company);
            })
            ->where( function($q) use ($query) {
              $q->where('nom', 'LIKE',"%{$query}%");
              $q->orWhere('prenom','LIKE', "%{$query}%");
              })  
              ->whereHas('deposit', function ($query) use($depot) {
                $query->where('name', $depot);
                })
            ->paginate(10));
        return $users;
         // serch for role and depot
        }elseif(isset($depot) && isset($role)){
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
          $query->where('company_id', $company);
            })
            ->whereHas('role', function ($query) use($role) {
              $query->where('name', $role);
          }) 
              ->whereHas('deposit', function ($query) use($depot) {
                $query->where('name', $depot);
                })
            ->paginate(10));
        return $users;
         // serch for search name and role
        }elseif(isset($query) && isset($role)){
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
          $query->where('company_id', $company);
            })
            ->where( function($q) use ($query) {
              $q->where('nom', 'LIKE',"%{$query}%");
              $q->orWhere('prenom','LIKE', "%{$query}%");
              })  
              ->whereHas('role', function ($query) use($role) {
                $query->where('name', $role);
            }) 
            ->paginate(10));
            return $users;
             // serch for search name 
        }elseif(isset($query)) {
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
              $query->where('company_id', $company);
                 })
          ->where( function($q) use ($query) {
              $q->where('nom', 'LIKE',"%{$query}%");
              $q->orWhere('prenom','LIKE', "%{$query}%");
              }) 
        
            ->paginate(10));
        return $users;
         // serch for role 
        }elseif(isset($role) && !isset($query)){
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
          $query->where('company_id', $company);
            })
              ->whereHas('role', function ($query) use($role) {
                $query->where('name', $role);
            }) 
            ->paginate(10));
             // serch for depot
        }elseif(isset($depot) && !isset($query) && !isset($role)){
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
          $query->where('company_id', $company);
            })
           ->whereHas('deposit', function ($query) use($depot) {
                $query->where('name', $depot);
                })
            ->paginate(10));
      // get all user for company
        }else{
          $users = UserResource::collection(User::latest()
          ->whereHas('companies', function ($query) use($company) {
          $query->where('company_id', $company);
            })
            ->paginate(10));
        return $users;
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
