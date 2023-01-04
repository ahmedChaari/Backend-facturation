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
                ->where('company_id', $company)
                ->orWhere('company_id', null)
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    })
                ->paginate(10));
            return $roles;
        }else{
            $roles = RoleResource::collection(Role::latest()
                ->where('company_id', $company)
                ->orWhere('company_id', null)
                ->paginate(10));
            return $roles;
        }
    }
    // get name
    function getlibelle($value){
        $name =  ucfirst(mb_substr($value, 0, 1));
        $pieces = explode(" ", $value);
        $name2 =  ucfirst(mb_substr($pieces[1], 0, 1));
        return   $name.$name2 ;
    }
     //create Role
     public function storeRole(RoleRequest $request){

        $value    = $request['name'];
        $company      = Auth::user()->company_id;
        $role         = Role::create([
            'name'        => $request['name'],
            'descreption' => $this->getlibelle($value),
            'company_id'  => $company,
        ]);
        return response([
            $role,
            'message'    => 'create a new Role of company !',
            ], 200);
    }

     //update Role
     public function updateRole(RoleRequest $request,Role $role){

        $value    = $request['name'];
        $role->update([
          'name'        => $request['name'],
          'descreption' => $this->getlibelle($value),
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
