<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Parametrage\CitiesResource;
use App\Http\Resources\Parametrage\CountiesResource;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

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
}
