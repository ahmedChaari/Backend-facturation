<?php

namespace Database\Seeders;

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
        Role::create([
            'name'          =>   'Administrateur',
            'descreption'   =>   'AD',
            ]);
        Role::create([
            'name'          =>   'Administrateur secondaire',
            'descreption'   =>   'AS',
            ]);
        Role::create([
            'name'          =>   'Employee',
            'descreption'   =>   'EM',
            ]);
        Role::create([
            'name'          =>   'Employee secondaire',
            'descreption'   =>   'ES',
            ]);
        Role::create([
            'name'          =>   'livreur',
            'descreption'   =>   'LV',
            ]);
    }
}
