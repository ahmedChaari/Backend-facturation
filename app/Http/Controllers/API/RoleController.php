<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Resources\Role\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function listRoles(Request $request){
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
        if (isset($query)) {
            $roles = RoleResource::collection(Role::latest()
                ->where('name', $company)
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    })  
                ->paginate(10));
            return $roles;
        }else{
            $roles = RoleResource::collection(Role::latest()
                ->where('company_id', $company) 
                ->paginate(10));
            return $roles;
        }
    }
     //create Role
     public function storeRole(RoleRequest $request){

        $descreption =  ucfirst(mb_substr($request['name'], 0, 1));
        $company      = Auth::user()->company_id;
        $role         = Role::create([
            'name'        => $request['name'],
            'descreption' => $descreption,
            'company_id'  => $company, 
        ]);
        return response([
            $role,
            'message'    => 'create a new Role of company !',
            ], 200); 
    }

     //update Role
     public function updateRole(RoleRequest $request,Role $role){

        $descreption =  ucfirst(mb_substr($request['name'], 0, 1));
        $role->update([   
          'name'        => $request['name'],
          'descreption' => $descreption,
        ]); 
      return response([
        $role,
        'message'    => 'update a category of company !',
        ], 200); 
      }

       //delete Deposit
    public function deleteRole($id)
    {
          $role = Role::find($id);
          if (isset($role)) {
              $role = Role::find($id)->delete();
              return response([
                  'message'    => 'The Role was Deleted',
                  ], 200);
          }else{
              return response([
                  'message'    => 'The Role does\'n existing',
                  ], 401);
          }
    }

    //restore the role
    public function restoreRole($id)
    {
        Role::withTrashed()->find($id)->restore();
        return response([
            'message'    => 'The Role was Restored',
            ], 201);
    
    } 
}
