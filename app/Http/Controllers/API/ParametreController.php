<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Menu\MenuResource;
use App\Http\Resources\Menu\SousMenuResource;
use App\Http\Resources\ModelRole\ModelRoleResource;
use App\Http\Resources\ModelRole\RoleMResource;
use App\Http\Resources\ModelRole\RoleResource as ModelRoleRoleResource;
use App\Http\Resources\Parametrage\CitiesResource;
use App\Http\Resources\Parametrage\CountiesResource;
use App\Http\Resources\Role\RoleResource;
use App\Models\City;
use App\Models\Country;
use App\Models\Menu;
use App\Models\Role;
use App\Models\SousMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametreController extends Controller
{
    // list of country
    public function listCountries(Request $request){
        $query    =  $request->get('search');
       
        if (isset($query)) {
            $countries = CountiesResource::collection(Country::
                where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    $q->where('capital', 'LIKE',"%{$query}%");
                    })
                    ->orderBy('name', 'asc')
                    ->paginate(10));
            return $countries;
        }else{
            $countries = CountiesResource::collection(Country::
                orderBy('name', 'asc')
                ->paginate(10));
            return $countries;
        }
    }

    //list of city
    public function listCities(Request $request){

        $query    =  $request->get('search');
        if (isset($query)) {
            $cities = CitiesResource::collection(City::where('country_id','=' ,'149')
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                })
                ->orderBy('name', 'asc')  
                ->paginate(10));
                return  $cities ;
        }else{
            $cities = CitiesResource::collection(City::where('country_id','=' ,'149')
                ->orderBy('name', 'asc')
                ->paginate(10));
                return  $cities ;
        }
         
    }
    //list of menu
    public function listMenu(){
            $menus = MenuResource::collection(Menu::
                 orderBy('name', 'asc')  
                 ->with('sousMenus')
                ->get());
                return  $menus ;
    }
    //list of sousmenu
    public function listSousMenu(){
        $menus = SousMenuResource::collection(SousMenu::
             groupBy('menu_id')
             ->orderBy('id', 'asc')  
             ->get());
        return  $menus ;
    }
    //list of sousmenu
    public function listModelRoles(){
        $company  = Auth::user()->company_id;
        $menus = RoleMResource::collection(Role::
             whereHas('modelRoles', function ($query) use($company) {
                $query->where('company_id', $company);
            })
            ->with('modelRoles')
            ->orderBy('id', 'asc')  
            ->get());
        return  $menus ;
    }
}
