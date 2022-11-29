<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::all()->random()->id;
        
        Role::create([
            'name'          =>   'Administrateur',
            'company_id'    =>   $company,
            'descreption'   =>   'AD',
            ]);
        Role::create([
            'name'          =>   'Administrateur secondaire',
            'company_id'    =>   $company,
            'descreption'   =>   'AS',
            ]);
        Role::create([
            'name'          =>   'Employee',
            'company_id'    =>   $company,
            'descreption'   =>   'EM',
            ]);
        Role::create([
            'name'          =>   'Employee secondaire',
            'company_id'    =>   $company,
            'descreption'   =>   'ES',
            ]);
        Role::create([
            'name'          =>   'livreur',
            'company_id'    =>   $company,
            'descreption'   =>   'LV',
            ]);
    }
}
