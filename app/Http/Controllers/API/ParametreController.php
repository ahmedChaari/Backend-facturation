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
    public function listCountries(Request $request){
        $query    =  $request->get('search');
       
        if (isset($query)) {
            $countries = CountiesResource::collection(Country::latest()
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    $q->where('capital', 'LIKE',"%{$query}%");
                    })  
                ->paginate(10));
            return $countries;
        }else{
            $countries = CountiesResource::collection(Country::latest()
                ->get(10));
            return $countries;
        }
    }
    public function listCities(Request $request){
        $query    =  $request->get('search');
       
        if (isset($query)) {
            $countries = CitiesResource::collection(City::latest()
                ->where('country_id','=' ,'149')
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                })  
                ->paginate(10));
            return $countries;
        }else{
            $countries = CitiesResource::collection(City::latest()
                ->where('country_id','=' ,'149')
                ->paginate(10));
            return $countries;
        }
    }
}
