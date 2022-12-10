<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModelRole\ModelRoleResource;
use App\Models\ModelRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelRoleController extends Controller
{
   public function listModelRole(Request $request){
    $company  = Auth::user()->company_id;

         $modelRole = ModelRoleResource::collection(ModelRole::
               where('company_id', $company) 
               ->where('menu_id', !null)
                //->with('menu')
                //->groupBy('role_id')
                ->paginate(10));
        return  $modelRole;
   }
}
