<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
     //create Role
     public function storeCategory(RoleRequest $request){

        $company  = Auth::user()->company_id;
        $role         = Role::create([
            'name'        => $request['name'],
            'descreption' => $request['descreption'],
            'company_id'  => $company, 
        ]);
        return response([
            $role,
            'message'    => 'create a new Role of company !',
            ], 200); 
    }

     //update Role
     public function updateCategory(RoleRequest $request,Role $role){

        $role->update([   
          'name'        => $request['name'],
          'descreption' => $request['descreption'],
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
