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
            return response([
                $agences,
                'message'    => 'list of agence !',
                ], 200);
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
    function getlibelle($value){               
        $count = str_word_count($value);
        if($count < 2){
             $name =  ucfirst(mb_substr($value, 0, 1));
             return $name;
        }else{
            $name =  ucfirst(mb_substr($value, 0, 1));
            $pieces = explode(" ", $value);
        // echo $pieces[1]; // piece1
            $name2 =  ucfirst(mb_substr($pieces[1], 0, 1));
            return   $name.$name2 ;
        }             
    }
    // create agence
    public function storeAgence(Request $request){
        $company  = Auth::user()->company_id;
        $value    = $request['name'];
        $category         = Agence::create([
            'name'        => $value,
            'libelle'     => $this->getlibelle($value),
            'company_id'  => $company, 
        ]);
        return response([
            $category,
            'message'    => 'create a new agence of company !',
            ], 200); 
    }

    //update agence of company

    public function updateAgence(Request $request,Agence $agence){
        $value    = $request['name'];
        $agence->update([   
            'name'        => $value,
            'libelle'     => $this->getlibelle($value),
          ]); 
        return response([
          $agence,
          'message'    => 'update a agence of company !',
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
