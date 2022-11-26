<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Resources\Product\CreateProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function storeProduct(Request $request){

        $company  = Auth::user()->company_id;

        $Userid = Auth::user()->id;
        //get the base-64 from data  CreateCompanyReques
        $image = $request->image;

        //decode base64 string
        $image = base64_decode($image);

        $safeName = Str::random(10).'.'.'png';
        Storage::disk('public')->put('product/'.$safeName, $image);
        $path     = env('APP_URL').'/storage/product/'.$safeName;

      $product = Product::create([   
          'company_id'      => $company, 
          'user_id'         => $Userid,
          'path_image'      => $path,
          'reference'       => $request['reference'],
          'vendor_id'       => $request['vendor_id'],
          'designation'     => $request['designation'],
          'prix_achat'      => $request['prix_achat'],
          'prix_vente'      => $request['prix_vente'],
          'category_id'     => $request['category_id'],
          'unite'           => $request['unite'],
          'code_bare'       => $request['code_bare'],
          'stock_min'       => $request['stock_min'],
          'TVA'             => $request['TVA'],
          'actif'           => $request['actif'],
          'rayon_a'         => $request['rayon_a'],
          'rayon_b'         => $request['rayon_b'],
          'deposit_id'      => $request['deposit_id'],
          'quantite_initial'=> $request['quantite_initial'],
          'description'     => $request['description'],
    ]);
   
    //dd($product);
    return response([
      $product,
      'message'    => 'create a new product !',
      ], 200); 

    }
}
