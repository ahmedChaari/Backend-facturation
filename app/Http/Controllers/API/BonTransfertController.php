<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bon\BonResource;
use App\Http\Resources\Bon\BonTransfertResource;
use App\Models\Bon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonTransfertController extends Controller
{
    // Create Bon Sotrie
    public function storeBonTransfert(Request $request){

        $company   = Auth::user()->company_id;
        $userId    = Auth::user()->id;
        $date      = date('dy');
        $reference = 'BT'.$date.'-'.rand(10000,100);
        $bonType   = 'BT' ;
        $valid     = 0 ;
        $bonEntre = Bon::create([   
            'company_id' => $company, 
            'source_id' => $request['source_id'],
            'destination_id' => $request['destination_id'],
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
        new  BonTransfertResource($bonEntre),
        'message'    => 'create a new Bon Entree !',
        ], 200); 
     }
}
