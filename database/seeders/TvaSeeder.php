<?php

namespace Database\Seeders;

use App\Models\Tva;
use Illuminate\Database\Seeder;

class TvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tva::create([
            'number'           => 0,
        ]);
        Tva::create([
            'number'           => 7,
        ]);
        Tva::create([
            'number'           => 10,
        ]);
        Tva::create([
            'number'           => 14,
        ]);
        Tva::create([
            'number'           => 20,
        ]);
    }
}
