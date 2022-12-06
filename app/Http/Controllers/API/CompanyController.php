<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateCompanyReques;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\ModelRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
  public function listCompanies(){

    
    $userId  = Auth::user()->id;

    $company = User::latest()
    ->wherePivot('user_id', '=',  $userId)
           
            ->get(); 
    return $company; 
  }

    public function storeCompany(CreateCompanyReques $request){

       // $Userid = Auth::user()->id;
        //get the base-64 from data  CreateCompanyReques
        $image = $request->logo;

        //decode base64 string
        $image = base64_decode($image);

        $safeName = Str::random(10).'.'.'png';
        Storage::disk('public')->put('company/'.$safeName, $image);
        $path     = env('APP_URL').'/storage/company/'.$safeName;

      $company = Company::create([   
          'name'             => $request['name'],
          'date_creation'    => $request['date_creation'], 
          'ICE'              => $request['ICE'],
          'fiscale'          => $request['fiscale'],
          'registre_commerce'=> $request['registre_commerce'],
          'patent'           => $request['patent'],
          'cnss'             => $request['cnss'],
          'activite'         => $request['activite'],
          'gerant'           => $request['gerant'],
          'contact'          => $request['contact'],
          'adresse'          => $request['adresse'],
          'tel'              => $request['tel'],
          'tel_mobile'       => $request['tel_mobile'],
          'fax'              => $request['fax'],
          'email'            => $request['email'],
          'web'              => $request['web'],
          'logo'             => $path,
    ]);

     
    $instance  =  new Company();
    $instance->storeRoleCompany($company->id);

    
    //$userArray = explode("," , $Userid);
    //$company->users()->attach($userArray);
   
    //dd($company);
    return response([
      new  CompanyResource($company),
      'message'    => 'create a new company !',
      ], 200); 

    }
}
