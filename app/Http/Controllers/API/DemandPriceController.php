<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\DemandPrice\demandPriceResource;
use App\Http\Resources\DemandPrice\ProductDemandPriceResource;
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
        //$demandPrice,
        new  DemandPriceResource($demandPrice),
        'message'    => 'create a new Bon Entree !',
        ], 200); 
     }

     //update demand price

     //
     public function updateDemandPrice(Request $request,DemandPrice $demandPrice){
      $demandPrice->update([   
        'date_demand_price'=> $request['date_demand_price'],            
        'vendor_id'        => $request['vendor_id'],
      ]); 
      return response([
       
        new  DemandPriceResource($demandPrice),
        'message'    => 'update a new Bon Entree !',
        ], 200); 
     }

    //update product demand price

     //

     public function updateProductDemPrice(Request $request,DemandPriceProduct $demandPriceProduct){
      $demandPriceProduct->update([   
        'price'   => $request['price'],            
        'amount'  => $request['amount'],
      ]); 
      return response([
        new  ProductDemandPriceResource($demandPriceProduct),
        'message'    => 'update a new Bon Entree !',
        ], 200); 
     }

     //delete Product for demand Price

     //
     public function deleteProductDemPrice($id)
     {
           $product = DemandPriceProduct::find($id);
           if (isset($product)) {
               $product = DemandPriceProduct::find($id)->destroy($id);
               return response([
                   'message'    => 'The Product was Deleted',
                   ], 200);
           }else{
               return response([
                   'message'    => 'The Product does\'n existing',
                   ], 401);
           }
     }

     //show product for demand price

     //
     public function showProductDemPrice($id)
     {
          // $product = DemandPriceProduct::where('product_id', $idProduct)->get();

           $product = DemandPriceProduct::find($id);
           if (isset($product)) {
               return response([
                  // $product,
                   new  ProductDemandPriceResource($product),
                   'message'    => 'The Product existing',
                   ], 200);
           }else{
               return response([
                   'message'    => 'The Product does\'n existing',
                   ], 401);
           }
     }
     public function showDemPrice($id)
     {
           $demandPrice = DemandPrice::find($id);
           if (isset($demandPrice)) {
               return response([
                 
                  new  DemandPriceResource($demandPrice),
                   'message'    => 'The Product existing',
                   ], 200);
           }else{
               return response([
                   'message'    => 'The Product does\'n existing',
                   ], 401);
           }
     }
}
