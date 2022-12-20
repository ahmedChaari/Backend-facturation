<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bon\BonResource;
use App\Http\Resources\Bon\BonTransfertResource;
use App\Models\Bon;
use App\Models\BonProduct;
use App\Models\Product;
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
   // $productArray = explode("," ,$request->products);
   // $bonEntre->products()->attach($productArray);



   // $componentArray = explode("," ,$request->component_id);
    $productArray = explode("," ,$request->products);
    //$pricearray     = explode("," ,$request->priceC);
    $amountArray     = explode("," ,$request->amount);
   // $requiredComponentArray     = explode("," ,$request->required_component);
    $priceArray      = explode("," ,$request->price);
    $index =0 ;
    foreach ($productArray as $productSingle){
        $BnProduct      = new BonProduct();
        $BnProduct->bon_id      = $bonEntre->id;
        $BnProduct->product_id  = $productSingle;
        $BnProduct->price       = $priceArray[$index];
        $BnProduct->amount      = $amountArray[$index];
        $BnProduct->save();

        $product= Product::findOrFail($BnProduct->product_id);
        $product->update([   
            'quantite_initial'     =>  $amountArray[$index],
            ]);
        $index++; 
    }

       // foreach ($productArray as $ProductSingle){
       //     $product= Product::findOrFail($ProductSingle);
       //     $product->update([   
             //   'deposit_id'     =>  $bonEntre->destination_id,
      //          ]);
     //   }

      return response([
        new  BonTransfertResource($bonEntre),
        'message'    => 'create a new Bon Transfert !',
        ], 200); 
     }
}
