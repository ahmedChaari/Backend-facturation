<?php

namespace Database\Seeders;

use App\Models\ClientType;
use App\Models\Company;
use Illuminate\Database\Seeder;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        ClientType::create([
            'name'          =>   'Affilié',
                ]);
        ClientType::create([
            'name'          =>   'Client final',
                ]);
        ClientType::create([
            'name'          =>   'Grossiste',
                ]);
        ClientType::create([
            'name'          =>   'Revendeur',
                ]);
                                       
    }
}
