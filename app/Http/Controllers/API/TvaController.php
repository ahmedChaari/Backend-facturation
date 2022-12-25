<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tva\TvaResource;
use App\Models\Tva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TvaController extends Controller
{
    public function listTvas()
    {
        $company  = Auth::user()->company_id;
       
            $unities = TvaResource::collection(Tva::latest()
                ->where('company_id', $company)
                ->orWhere('company_id', null) 
                ->orderBy('number', 'ASC')
                ->get());
            return response([
                $unities,
                'message'    => 'list of Tva !',
                ], 200);
       
    }
}
