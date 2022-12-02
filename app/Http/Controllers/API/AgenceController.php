<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Agence\AgenceResource;
use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenceController extends Controller
{
    public function listAgences(Request $request){
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
        if (isset($query)) {
            $agences = AgenceResource::collection(Agence::latest()
                ->where('company_id', $company)
                ->orWhere('company_id', null) 
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    })  
                ->get());
            return $agences;
        }else{
            $agences = AgenceResource::collection(Agence::latest()
                ->where('company_id', $company) 
                ->orWhere('company_id', null) 
                ->get());
            return $agences;
        }
    }
    // create agence
    public function storeAgence(Request $request){
        $company  = Auth::user()->company_id;
        $category         = Agence::create([
            'name'        => $request['name'],
            'company_id'  => $company, 
        ]);
        return response([
            $category,
            'message'    => 'create a new category of company !',
            ], 200); 
    }
}
