<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientType\ClientTypeResource;
use App\Models\ClientType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listClientTypes(Request $request)
    {
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
        if (isset($query)) {
            $clientType = ClientTypeResource::collection(ClientType::latest()
                ->where('company_id', $company)
                ->orWhere('company_id', null) 
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    })  
                ->get());
                return response([
                    $clientType,
                    'message'    => 'list of client type !',
                    ], 200);
        }else{
            $clientType = ClientTypeResource::collection(ClientType::latest()
                ->where('company_id', $company) 
                ->orWhere('company_id', null) 
                ->get());
                return response([
                    $clientType,
                    'message'    => 'list of client type !',
                    ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeClientType(Request $request)
    {
        $company  = Auth::user()->company_id;
       
        $category         = ClientType::create([
            'name'        => $request['name'],
            'company_id'  => $company, 
        ]);
        return response([
            $category,
            'message'    => 'create a new client type of company !',
            ], 200); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateClientType(Request $request,ClientType $clientType)
    {
        $clientType->update([   
            'name'        => $request['name'],
          ]); 
        return response([
          $clientType,
          'message'    => 'update a client type of company !',
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
