<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function listCategories(Request $request){
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
        if (isset($query)) {
            $categories = CategoryResource::collection(Category::latest()
                ->where('company_id', $company)
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    })  
                ->paginate(10));
            return $categories;
        }else{
            $categories = CategoryResource::collection(Category::latest()
                ->where('company_id', $company) 
                ->paginate(10));
            return $categories;
        }
    }
    //create Category
    public function storeCategory(Request $request){

        $company  = Auth::user()->company_id;
        $category         = Category::create([
            'name'        => $request['name'],
            'company_id'  => $company, 
        ]);
        return response([
            $category,
            'message'    => 'create a new category of company !',
            ], 200); 
    }
    //update Deposit

    public function updateCategory(Request $request,Category $category){

        $category->update([   
          'name'   => $request['name'],
        ]); 
      return response([
        $category,
        'message'    => 'update a category of company !',
        ], 200); 
      }
      //delete Deposit
    public function deleteCategory($id)
      {
            $category = Category::find($id);
            if (isset($category)) {
                $category = Category::find($id)->delete();
                return response([
                    'message'    => 'The Category was Deleted',
                    ], 200);
            }else{
                return response([
                    'message'    => 'The Category does\'n existing',
                    ], 401);
            }
      }
    public function restoreCategory($id)
        {
            Category::withTrashed()->find($id)->restore();
            return response([
                'message'    => 'The Category was Restored',
                ], 201);
        
        }  

}
