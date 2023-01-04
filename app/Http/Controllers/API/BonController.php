<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bon\BonRequest;
use App\Http\Resources\Bon\BonResource;
use App\Http\Resources\Bon\HistoriqueBonResource;
use App\Models\Bon;
use App\Models\BonProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BonController extends Controller
{
     //********* list bon Entre */

     //*************************/
    public function listBonEntres(Request $request){

        $company  = Auth::user()->company_id;
        $query    =  $request->get('search');
        $depot    =  $request->get('depot');
        $valid    =  $request->get('valid');

        //date Between
        $firstDate = $request->get('firstDate');
        $lastDate   = $request->get('lastDate');
        $createdAt = [$firstDate.' 00:00:00', $lastDate.' 23:59:59'] ;


        if(isset($query) && isset($depot) && isset($valid) && isset($lastDate)){
            $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
            // echo 'search for All paramettre' ;
        }elseif (isset($lastDate) ) {
            if (isset($valid) && isset($query) && isset($lastDate)){
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
                // echo 'lastDate && valid && search';
            }
            elseif (isset($lastDate) && isset($query) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
               //  echo 'lastDate && Query && depot ';
            }elseif (isset($lastDate) && isset($valid) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                // echo 'lastDate && valid && depot ';
            }elseif(isset($lastDate) && isset($depot)){
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
               // echo 'lastDate && depot';
            }elseif(isset($lastDate) && isset($query)){
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
               //  echo 'lastDate && Query';
            }elseif (isset($lastDate) && isset($valid)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
                // echo'lastDate && valid';
            }
            else{
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
                // echo 'lastDate';
            }
        }
        elseif(isset($query)){
            if(isset($query) && isset($depot) && isset($valid) ) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                // echo 'depot && valid && search';
            }elseif (isset($query) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                // echo 'query && depot';
            }
            elseif (isset($query) && isset($valid)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->paginate(10));
                return $bones;
               //  echo 'valid &&  query';
            }else{
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->paginate(10));
                return $bones;
               //  echo 'query ++';
            }
        }elseif(isset($valid)){
            if(isset($valid) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where('valid', $valid)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                 //echo 'depot && valid';
            }else{
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', 'BE')
                ->where('valid', $valid)
                ->paginate(10));
                return $bones;
                // echo 'valid';
            }
        }elseif(isset($depot)){
            $bones = BonResource::collection(Bon::latest()
            ->where('company_id', $company)
            ->where('bon_type', 'BE')
            ->whereHas('deposit', function ($query) use($depot) {
                $query->where('name', $depot);
                })
            ->paginate(10));
            return $bones;
             //    echo 'depot';
        }
        else{
            $bones = BonResource::collection(Bon::latest()
            ->where('company_id', $company)
            ->where('bon_type', 'BE')
            ->paginate(10));
        // echo 'all';
        return $bones;
        }
     }
     //********* list bon sorti */

     //************************/
     public function listBonSorties(Request $request){

        $company  = Auth::user()->company_id;
        $query    =  $request->get('search');
        $depot    =  $request->get('depot');
        $valid    =  $request->get('valid');
        $type     = 'BS';
        //date Between
        $firstDate = $request->get('firstDate');
        $lastDate   = $request->get('lastDate');
        $createdAt = [$firstDate.' 00:00:00', $lastDate.' 23:59:59'] ;


        if(isset($query) && isset($depot) && isset($valid) && isset($lastDate)){
            $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
            // echo 'search for All paramettre' ;
        }elseif (isset($lastDate) ) {
            if (isset($valid) && isset($query) && isset($lastDate)){
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
                // echo 'lastDate && valid && search';
            }
            elseif (isset($lastDate) && isset($query) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
               //  echo 'lastDate && Query && depot ';
            }elseif (isset($lastDate) && isset($valid) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                // echo 'lastDate && valid && depot ';
            }elseif(isset($lastDate) && isset($depot)){
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->whereBetween('date_bon', $createdAt)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
               // echo 'lastDate && depot';
            }elseif(isset($lastDate) && isset($query)){
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
               //  echo 'lastDate && Query';
            }elseif (isset($lastDate) && isset($valid)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where('valid', $valid)
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
                // echo'lastDate && valid';
            }
            else{
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->whereBetween('date_bon', $createdAt)
                ->paginate(10));
                return $bones;
                // echo 'lastDate';
            }
        }
        elseif(isset($query)){
            if(isset($query) && isset($depot) && isset($valid) ) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                // echo 'depot && valid && search';
            }elseif (isset($query) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                // echo 'query && depot';
            }
            elseif (isset($query) && isset($valid)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->where('valid', $valid)
                ->paginate(10));
                return $bones;
               //  echo 'valid &&  query';
            }else{
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where( function($q) use ($query) {
                    $q->where('reference',    'LIKE', "%{$query}%");
                    $q->orWhere('description','LIKE', "%{$query}%");
                })
                ->paginate(10));
                return $bones;
               //  echo 'query ++';
            }
        }elseif(isset($valid)){
            if(isset($valid) && isset($depot)) {
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where('valid', $valid)
                ->whereHas('deposit', function ($query) use($depot) {
                    $query->where('name', $depot);
                    })
                ->paginate(10));
                return $bones;
                 //echo 'depot && valid';
            }else{
                $bones = BonResource::collection(Bon::latest()
                ->where('company_id', $company)
                ->where('bon_type', $type)
                ->where('valid', $valid)
                ->paginate(10));
                return $bones;
                // echo 'valid';
            }
        }elseif(isset($depot)){
            $bones = BonResource::collection(Bon::latest()
            ->where('company_id', $company)
            ->where('bon_type', $type)
            ->whereHas('deposit', function ($query) use($depot) {
                $query->where('name', $depot);
                })
            ->paginate(10));
            return $bones;
             //    echo 'depot';
        }
        else{
            $bones = BonResource::collection(Bon::latest()
            ->where('company_id', $company)
            ->where('bon_type', $type)
            ->paginate(10));
        // echo 'all';
        return $bones;
        }
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
    $amountArray     = explode("," ,$request->amount);
    $priceArray      = explode("," ,$request->price);
    $index =0 ;
    foreach ($productArray as $productSingle){
        $BnProduct      = new BonProduct();
        $BnProduct->bon_id      = $bonEntre->id;
        $BnProduct->product_id  = $productSingle;
        $BnProduct->price       = $priceArray[$index];
        $BnProduct->amount      = $amountArray[$index];
        $BnProduct->save();
        $index++;
    }


      return response([
        new  BonResource($bonEntre),
        'message'    => 'create a new Bon Entree !',
        ], 200);
     }
     // ** Create Bon Sotrie



     //** //
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
    $amountArray     = explode("," ,$request->amount);
    $priceArray      = explode("," ,$request->price);
    $index =0 ;
    foreach ($productArray as $productSingle){
        $BnProduct              = new BonProduct();
        $BnProduct->bon_id      = $bonEntre->id;
        $BnProduct->product_id  = $productSingle;
        $BnProduct->price       = $priceArray[$index];
        $BnProduct->amount      = $amountArray[$index];
        $BnProduct->save();
        $index++;
    }
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

     //valider bon entre and make update for mroduct amount

     //
     public function validBonEntre(Request $request,$id){

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

    public function getHistoriqueProductBon(Request $request){

        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;

        $not_ids = ['BS','BT','BE'];
            $bones = HistoriqueBonResource::collection(BonProduct::latest()
              //  ->where('company_id', $company)
                ->orderBy('created_at', 'DESC')
               // ->whereIn('bon_type', $not_ids)
                ->simplePaginate(5));
        return response([
            $bones,
            'message'    => 'list of Historique of bon !',
            ], 200);
    }
}
