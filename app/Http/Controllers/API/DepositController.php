<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Deposit\DepositResource;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function listDeposits(Request $request){
        $query    =  $request->get('search');
        $company  = Auth::user()->company_id;
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

    //create Deposit
    public function storeDeposit(Request $request){
        $company  = Auth::user()->company_id;
        $deposit          = Deposit::create([
            'name'        => $request['name'],
            'company_id'  => $company, 
        ]);
        return response([
            new  DepositResource($deposit),
            'message'    => 'create a new deposit(depot) of company !',
            ], 200); 
    }
    //update Deposit

    public function updateDeposit(Request $request,Deposit $deposit){

        $deposit->update([   
          'name'   => $request['name'],
        ]); 
      return response([
        new  DepositResource($deposit),
        'message'    => 'update a deposit of company !',
        ], 200); 
      }
      //delete Deposit
    public function deleteDeposit($id)
      {
            $deposit = Deposit::find($id);
            if (isset($deposit)) {
                $deposit = Deposit::find($id)->delete();
                return response([
                    'message'    => 'The Deposit was Deleted',
                    ], 200);
            }else{
                return response([
                    'message'    => 'The Deposit does\'n existing',
                    ], 401);
            }
      }
    public function restoreDeposit($id)
        {
            Deposit::withTrashed()->find($id)->restore();
            return response([
                'message'    => 'The Deposit was Restored',
                ], 401);
        
        }  

}
