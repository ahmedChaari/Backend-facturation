<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Deposit\DepositResource;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
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
}
