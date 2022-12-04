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
                return response([
                    $agences,
                    'message'    => 'list of agence !',
                    ], 200);
        }
    }
    // create agence
    public function storeAgence(Request $request){
        $company  = Auth::user()->company_id;
        $libelle =  ucfirst(mb_substr($request['name'], 0, 1));
        $category         = Agence::create([
            'name'        => $request['name'],
            'libelle'     => $libelle,
            'company_id'  => $company, 
        ]);
        return response([
            $category,
            'message'    => 'create a new agence of company !',
            ], 200); 
    }

    //delete agence
    public function deleteAgence($id)
    {
          $company  = Auth::user()->company_id;
          $category = Agence::where('id', $id)
                     ->where('company_id',  $company);
          if (isset($category)) {
              echo 'deleted';
          }else{
              echo 'not deleted';
          }
    }

}
