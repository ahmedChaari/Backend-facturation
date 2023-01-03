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
            'description'=> $request['description'],
            'date_bon'   => $request['date_bon'],
            'user_id'    => $userId,
            'bon_type'   => $bonType,
            'reference'  => $reference,
            'valid'      => $valid,
      ]);

    $productArray    = explode("," ,$request->products);
    $amountArray     = explode("," ,$request->amount);
    $priceArray      = explode("," ,$request->price);
    $index =0 ;
    foreach ($productArray as $productSingle){
        $BnProduct      = new BonProduct();
        $BnProduct->source_id      = $request['source_id'];
        $BnProduct->destination_id = $request['destination_id'];
        $BnProduct->bon_id         = $bonEntre->id;
        $BnProduct->product_id  = $productSingle;
        $BnProduct->price       = $priceArray[$index];
        $BnProduct->amount      = $amountArray[$index];
        $BnProduct->save();
        $index++;
    }
      return response([
        new  BonTransfertResource($bonEntre),
        'message'    => 'create a new Bon Transfert !',
        ], 200);
    }
     //valider bon entre and make update for mroduct amount

     //
     public function validBonTransfer(Request $request,$id){

        $bon = Bon::find($id);
        $validBon = $request->valid ;
        $bon->update([
            'valid'    => $validBon,
          ]);
          $company  = Auth::user()->company_id;
          $Userid   = Auth::user()->id;
          $destinationId = $request->destination_id;
          $amountArray     = explode("," ,$request->amount);
          $productArray    = explode("," ,$request->products);
          $index =0 ;

        foreach ($productArray as $productSingle){
            $product= Product::findOrFail($productSingle);
            $product->update([
              'quantite_initial'     =>   $product->quantite_initial - $amountArray[$index],
                ]);
                $product = Product::create([
                    'company_id'      => $company,
                    'user_id'         => $Userid,
                    'path_image'      => $product->path,
                    'reference'       => $product->reference,
                    'vendor_id'       => $product->vendor_id,
                    'designation'     => $product->designation,
                    'prix_achat'      => $product->prix_achat,
                    'prix_vente'      => $product->prix_vente,
                    'category_id'     => $product->category_id,
                    'unite'           => $product->unite,
                    'code_bare'       => $product->code_bare,
                    'stock_min'       => $product->stock_min,
                    'tva_id'          => $product->tva_id,
                    'actif'           => $product->actif,
                    'rayon_a'         => $product->rayon_a,
                    'rayon_b'         => $product->rayon_b,
                    'deposit_id'      => $destinationId,
                    'quantite_initial'=> $amountArray[$index],
                    'description'     => $product->description,
                ]);
                $index++;
            }
        return response([
           new  BonTransfertResource($bon),
          'message'    => 'valid the Bon Transfere of company !',
          ], 200);
     }
}
