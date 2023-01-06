<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bon;
use App\Models\BonProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonCommandeController extends Controller
{
    //** creation des bon command */
    public function storeBonCommande(Request $request){

        $company  = Auth::user()->company_id;
        $userId   = Auth::user()->id;
        $date = date('dy');
        $reference = 'BC'.$date.'-'.rand(10000,100);
        $bonType = 'BC' ;
        $valid = 0 ;
        $bonCommande = Bon::create([
            'company_id' => $company,
            'vendor_id'  => $request['vendor_id'],
            'date_bon'   => $request['date_bon'],
            'user_id'    => $request['user_id'],
            'bon_type'   => $bonType,
            'reference'  => $reference,
            'valid'      => $valid,
      ]);

    $productArray    = explode("," ,$request->products);
    $amountArray     = explode("," ,$request->amount);
    $priceArray      = explode("," ,$request->price);
    $index =0 ;
    foreach ($productArray as $productSingle){
        $BnProduct              = new BonProduct();
        $BnProduct->bon_id      = $bonCommande->id;
        $BnProduct->product_id  = $productSingle;
        $BnProduct->price       = $priceArray[$index];
        $BnProduct->amount      = $amountArray[$index];
        $BnProduct->save();
        $index++;
    }
      return response([
        $bonCommande,
        // new  BonResource($bonEntre),
        'message'    => 'create a new Bon Entree !',
        ], 200);
     }

     //** valider bon command */
     public function validBonCommande(Request $request,$id){

        $bon = Bon::find($id);
        $validBon = $request->valid ;
        $bon->update([
            'valid'    => $validBon,
          ]);

          $amountArray     = explode("," ,$request->amount);
          $productArray    = explode("," ,$request->products);
          $index =0 ;

      if ($validBon == 1) {

        foreach ($productArray as $productSingle){
            $product= Product::findOrFail($productSingle);
            $product->update([
              'quantite_initial'     =>   $product->quantite_initial - $amountArray[$index],
                ]);
                $index++;
        }
      }elseif($validBon == 0){
        foreach ($productArray as $productSingle){
          $product= Product::findOrFail($productSingle);
          $product->update([
            'quantite_initial'     =>   $product->quantite_initial + $amountArray[$index],
              ]);
              $index++;
        }
      }
        return response([
           new  BonResource($bon),
          'message'    => 'valid the Bon Entree of company !',
          ], 200);
     }


}
