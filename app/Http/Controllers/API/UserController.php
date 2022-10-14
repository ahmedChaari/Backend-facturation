<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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


      if ( $request->has('path_image')) {
               //get the base-64 from data
                $image = $request->path_image;
                $image = base64_decode($image);
                $safeName = Str::random(10).'.'.'png';
            Storage::disk('public')->put('product/'.$safeName, $image);
            $path = env('APP_URL').'/storage/product/'.$safeName;
      }

        $userId     = Auth::user()->id;
        $user       = User::create([
                'nom'        => $request['nom'],
                'prenom'     => $request['prenom'], 
                'email'      => $request['email'],
                'gender'     => $request['gender'],
                'path_image' => $path,
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
    public function updateClient(UpdateUserRequest $request,User $user){

      $user->update([   
        'nom'        => $request['nom'],
        'prenom'     => $request['prenom'], 
        'email'      => $request['email'],
        'gender'     => $request['gender'],
        'adresse'    => $request['adresse'],
        'pseudo'     => $request['pseudo'],
        'deposit_id' => $request['deposit_id'],
        'password'   => bcrypt($request['password']),
    ]);
    return response([
     
      new  UserResource($user),
      'message'    => 'update a client of company !',
      ], 200); 

    }
}
