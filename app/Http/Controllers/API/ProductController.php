<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\CreateProductResource;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    public function listProduct(Request $request)
    {

        $company  = Auth::user()->company_id;
        $query    =  $request->get('search');
        $depot    =  $request->get('depot');
        $category =  $request->get('category');
        if(isset($query) && isset($depot) && isset($category)){
            $products = ProductResource::collection(Product::latest()
            ->where('company_id', $company)
            ->where( function($q) use ($query) {
                $q->where('code_bare',    'LIKE', "%{$query}%");
                $q->orWhere('reference',  'LIKE', "%{$query}%");
                $q->orWhere('designation','LIKE', "%{$query}%");
                $q->orWhere('description','LIKE', "%{$query}%");
                $q->orWhere('rayon_a',    'LIKE', "%{$query}%");
                $q->orWhere('rayon_b',    'LIKE', "%{$query}%");
            })  
            ->whereHas('category', function ($query) use($category) {
            $query->where('name', $category);
            }) 
            ->whereHas('deposit', function ($query) use($depot) {
            $query->where('name', $depot);
            })
            ->paginate(10));
        return $products;
        }
        elseif(isset($query)){
            $products = ProductResource::collection(Product::latest()
            ->where('company_id', $company)
            ->where( function($q) use ($query) {
                $q->where('code_bare',    'LIKE', "%{$query}%");
                $q->orWhere('reference',  'LIKE', "%{$query}%");
                $q->orWhere('designation','LIKE', "%{$query}%");
                $q->orWhere('description','LIKE', "%{$query}%");
                $q->orWhere('rayon_a',    'LIKE', "%{$query}%");
                $q->orWhere('rayon_b',    'LIKE', "%{$query}%");
            })  
            ->paginate(10));
        return $products;
        }elseif(isset($depot)){
            $products = ProductResource::collection(Product::latest()
            ->where('company_id', $company)
            ->whereHas('deposit', function ($query) use($depot) {
            $query->where('name', $depot);
            })
            ->paginate(10));
        return $products;
        }elseif(isset($category)){
            $products = ProductResource::collection(Product::latest()
            ->where('company_id', $company)
            ->whereHas('category', function ($query) use($category) {
            $query->where('name', $category);
            }) 
            ->paginate(10));
        return $products;
        }
        else{
            $products = ProductResource::collection(Product::latest()
            ->where('company_id', $company) 
            ->paginate(10));
        return $products;

        }
    }

    public function storeProduct(CreateProductRequest $request){

        $company  = Auth::user()->company_id;
        $Userid   = Auth::user()->id;
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

    public function updateProduct(UpdateProductRequest $request,Product $product){

        if ( $request->has('path_image')) {
            //get the base-64 from data
            
            $image = $request->path_image;
            $image = base64_decode($image);
            
            $safeName = Str::random(10).'.'.'png';
            Storage::disk('public')->put('product/'.$safeName, $image);
            $path = env('APP_URL').'/storage/product/'.$safeName;
            $product->update([   
                'path_image'      => $path,
                'reference'       => $request->reference,
                'vendor_id'       => $request->vendor_id,
                'designation'     => $request->designation,
                'prix_achat'      => $request->prix_achat,
                'prix_vente'      => $request->prix_vente,
                'category_id'     => $request->category_id,
                'unite'           => $request->unite,
                'code_bare'       => $request->code_bare,
                'stock_min'       => $request->stock_min,
                'TVA'             => $request->TVA,
                'actif'           => $request->actif,
                'rayon_a'         => $request->rayon_a,
                'rayon_b'         => $request->rayon_b,
                'deposit_id'      => $request->deposit_id,
                'quantite_initial'=> $request->quantite_initial,
                'description'     => $request->description,
            ]);
        }else {
            $product->update([   
                'reference'       => $request->reference,
                'vendor_id'       => $request->vendor_id,
                'designation'     => $request->designation,
                'prix_achat'      => $request->prix_achat,
                'prix_vente'      => $request->prix_vente,
                'category_id'     => $request->category_id,
                'unite'           => $request->unite,
                'code_bare'       => $request->code_bare,
                'stock_min'       => $request->stock_min,
                'TVA'             => $request->TVA,
                'actif'           => $request->actif,
                'rayon_a'         => $request->rayon_a,
                'rayon_b'         => $request->rayon_b,
                'deposit_id'      => $request->deposit_id,
                'quantite_initial'=> $request->quantite_initial,
                'description'     => $request->description,
            ]);
        }

    return response([
      $product,
      'message'    => 'create a new product !',
      ], 200); 

    }
     //delete Deposit
     public function deleteProduct($id)
     {
           $product = Product::find($id);
           if (isset($product)) {
               $product = Product::find($id)->delete();
               return response([
                   'message'    => 'The Product was Deleted',
                   ], 200);
           }else{
               return response([
                   'message'    => 'The Product does\'n existing',
                   ], 401);
           }
     }
     public function restoreProduct($id)
     {
         Product::withTrashed()->find($id)->restore();
         return response([
             'message'    => 'The Deposit was Restored',
             ], 401);
     
     }  
}
