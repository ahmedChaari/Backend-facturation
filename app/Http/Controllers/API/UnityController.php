<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Unity\UnityResource;
use App\Models\Unity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnityController extends Controller
{
    
    public function listUnities(Request $request)
    {
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
        if (isset($query)) {
            $unities = UnityResource::collection(Unity::latest()
                ->where('company_id', $company)
                ->orWhere('company_id', null) 
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    })  
                ->get());
            return response([
                $unities,
                'message'    => 'list of unity !',
                ], 200);
        }else{
            $unities = UnityResource::collection(Unity::latest()
                ->where('company_id', $company) 
                ->orWhere('company_id', null) 
                ->get());
            return response([
                $unities,
                'message'    => 'list of unity !',
                ], 200);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeUnity(Request $request){
        $company  = Auth::user()->company_id;
        $value    = $request['name'];
        $category         = Unity::create([
            'name'        => $value,
            'company_id'  => $company, 
        ]);
        return response([
            $category,
            'message'    => 'create a new unity of company !',
            ], 200); 
    }

  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUnity(Request $request,Unity $unity){
       
        $unity->update([   
            'name'        => $request['name'],
          ]); 
        return response([
          $unity,
          'message'    => 'update a agence of company !',
          ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
