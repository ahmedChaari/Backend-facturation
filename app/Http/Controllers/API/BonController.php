<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bon\BonRequest;
use App\Http\Resources\Bon\BonResource;
use App\Models\Bon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonController extends Controller
{
    public function listBonEntres(Request $request){
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
        
            $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->get());
            return response([
                $bones,
                'message'    => 'list of agence !',
                ], 200);
     }
     public function listBonSorties(Request $request){
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
        
            $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BS')
                ->get());
            return response([
                $bones,
                'message'    => 'list of agence !',
                ], 200);
     }
     //bon entree
     public function storeBonEntre(BonRequest $request){

        $company  = Auth::user()->company_id;
        $userId  = Auth::user()->id;
        $date = date('dy');
        $reference = 'BE'.$date.'-'.rand(10000,100);
        $bonType = 'BE' ;
        $valid = 0 ;
        $bonEntre = Bon::create([   
            'company_id' => $company, 
            'deposit_id' => $request['deposit_id'],
            'description'=> $request['description'], 
            'date_bon'   => $request['date_bon'],
            'user_id'    => $userId,
            'bon_type'   => $bonType,
            'reference'  => $reference, 
            'valid'      => $valid, 
      ]);                  
        $productArray = explode("," ,$request->products);
        $bonEntre->products()->attach($productArray);
        
      return response([
        new  BonResource($bonEntre),
        'message'    => 'create a new Bon Entree !',
        ], 200); 
     }
     // Create Bon Sotrie
     public function storeBonSortie(BonRequest $request){

        $company  = Auth::user()->company_id;
        $userId  = Auth::user()->id;
        $date = date('dy');
        $reference = 'BS'.$date.'-'.rand(10000,100);
        $bonType = 'BS' ;
        $valid = 0 ;
        $bonEntre = Bon::create([   
            'company_id' => $company, 
            'deposit_id' => $request['deposit_id'],
            'description'=> $request['description'], 
            'date_bon'   => $request['date_bon'],
            'user_id'    => $userId,
            'bon_type'   => $bonType,
            'reference'  => $reference, 
            'valid'      => $valid, 
      ]);                  
        $productArray = explode("," ,$request->products);
        $bonEntre->products()->attach($productArray);
        
      return response([
        new  BonResource($bonEntre),
        'message'    => 'create a new Bon Entree !',
        ], 200); 
     }
     // update bon Entre and sotie
     public function updateBonEntre(BonRequest $request,Bon $bon){

        $bon->update([   
            'deposit_id'  => $request['deposit_id'],
            'description' => $request['description'],
            'date_bon'    => $request['date_bon'],
          ]); 

          $productArray = explode("," ,$request->products);
          $bon->products()->sync($productArray);

        return response([
            new  BonResource($bon),
          'message'    => 'update a Bon Entree of company !',
          ], 200); 

     }
     // valid bon entre and sortie
     public function validBonEntre(Request $request,$id){

        $bon = Bon::find($id);
        $bon->update([   
            'valid'    => $request->valid,
          ]); 

        return response([
            new  BonResource($bon),
          'message'    => 'valid the Bon Entree of company !',
          ], 200); 

     }

     //delete Deposit
    public function deleteBonEntre($id)
    {
          $bonEntre = Bon::find($id);
          if (isset($bonEntre)) {
              $bonEntre = Bon::find($id)->delete();
              return response([
                  'message'    => 'The Bon Entree was Deleted',
                  ], 200);
          }else{
              return response([
                  'message'    => 'The Bon Entree does\'n existing',
                  ], 401);
          }
    }

    public function restoreBonEntre($id)
    {
        Bon::withTrashed()->find($id)->restore();
        return response([
            'message'    => 'The Bon Entree was Restored',
            ], 201);
    
    }  
}
