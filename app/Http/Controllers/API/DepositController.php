<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Deposit\DepositResource;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function listDeposits(Request $request,$company){
        $query    =  $request->get('search');
        if (isset($query)) {
            $deposits = DepositResource::collection(Deposit::latest()
                ->where('company_id', $company)
                ->where( function($q) use ($query) {
                    $q->where('name', 'LIKE',"%{$query}%");
                    })  
                ->paginate(10));
            return $deposits;
        }else{
            $deposits = DepositResource::collection(Deposit::latest()
                ->where('company_id', $company) 
                ->paginate(10));
            return $deposits;
        }
    }
    public function storeDeposit(Request $request){
        $deposit          = Deposit::create([
            'name'        => $request['name'],
            'company_id'  => $request['company_id'], 
        ]);
        return response([
            new  DepositResource($deposit),
            'message'    => 'create a new deposit(depot) of company !',
            ], 200); 
    }

    public function updateDeposit(Request $request,Deposit $deposit){

        $deposit->update([   
          'name'   => $request['name'],
        ]); 
      return response([
        new  DepositResource($deposit),
        'message'    => 'update a deposit of company !',
        ], 200); 
  
      }
}
