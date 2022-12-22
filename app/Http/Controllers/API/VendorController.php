<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\VendorRequest;
use App\Http\Resources\Vendor\VendorResource;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Show the form for Listing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listVendor(Request $request){

            $company  = Auth::user()->company_id;
            $modelRole = VendorResource::collection(Vendor::
                   where('company_id', $company) 
                    ->paginate(10));
            return  $modelRole;
       }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeVendor(VendorRequest $request){

        $company  = Auth::user()->company_id;
        $user     = Auth::user()->id;
      
        $category         = Vendor::create([
            'company_id'    => $company, 
            'user_id'       => $user, 
            'designation'   => $request['designation'],
            'RC'            => $request['RC'],
            'tel'           => $request['tel'],
            'fax'           => $request['fax'], 
            'ICE'           => $request['ICE'],
            'ville'         => $request['ville'], 
            'email'         => $request['email'],
            'adresse'       => $request['adresse'],
        ]);
        return response([
            $category,
            'message'    => 'create a new Vendor of company !',
            ], 200); 
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVendor(VendorRequest $request,Vendor $vendor){
       
        $vendor->update([   
            'designation'   => $request['designation'],
            'RC'            => $request['RC'],
            'tel'           => $request['tel'],
            'fax'           => $request['fax'], 
            'ICE'           => $request['ICE'],
            'ville'         => $request['ville'], 
            'email'         => $request['email'],
            'adresse'       => $request['adresse'],
          ]); 
        return response([
          $vendor,
          'message'    => 'update a Vendor of company !',
          ], 200); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteVendor($id)
    {
        if (Auth::user()->role_id == '1' ) {

            Vendor::withTrashed()->find($id)->delete();
                return response([
                    'message'    => 'The Vendor was deleted',
                    ], 201);
            }else{
                return response([
                    'message'    => 'you do not have any permission !',
                        ], 400);
            }
    }
    public function restoreVendor($id)
    {
        if (Auth::user()->role_id == '1') {
          
            Vendor::withTrashed()->find($id)->restore();
            return response([
                'message'    => 'The Vendor was Restored',
                ], 201);
        }else{
            return response([
                'message'    => 'you do not have any permission for restore !',
                    ], 400);
        }
    }  

}
