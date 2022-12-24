<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DemandPrice;
use App\Models\DemandPriceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandPriceController extends Controller
{
    public function storeDemandPrice(Request $request){

        $company = Auth::user()->company_id;
        $userId  = Auth::user()->id;
       
        $demandPrice = DemandPrice::create([   
            'company_id'       => $company, 
            'user_id'          => $userId,
            'date_demand_price'=> $request['date_demand_price'],            
            'vendor_id'        => $request['vendor_id'],
      ]);                  

    $productArray    = explode("," ,$request->products);
    $amountArray     = explode("," ,$request->amount);
    $priceArray      = explode("," ,$request->price);
    $index =0 ;

    foreach ($productArray as $productSingle){
        $product                  = new DemandPriceProduct();
        $product->demand_price_id = $demandPrice->id;
        $product->product_id      = $productSingle;
        $product->price           = $priceArray[$index];
        $product->amount          = $amountArray[$index];
        $product->save();
        $index++; 
    }
      return response([
        $demandPrice,
        //new  BonResource($demandPrice),
        'message'    => 'create a new Bon Entree !',
        ], 200); 
     }
     public function updateDemandPrice(Request $request,DemandPrice $demandPrice){
      $demandPrice->update([   
        'date_demand_price'=> $request['date_demand_price'],            
        'vendor_id'        => $request['vendor_id'],
      ]); 
      return response([
        $demandPrice,
        //new  BonResource($demandPrice),
        'message'    => 'update a new Bon Entree !',
        ], 200); 
     }
     public function updateProductDemPrice(Request $request,DemandPrice $demandPrice){

     }
}
