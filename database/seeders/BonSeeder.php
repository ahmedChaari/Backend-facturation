<?php

namespace Database\Seeders;

use App\Models\Bon;
use Illuminate\Database\Seeder;

class BonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bon::factory(40)->create();
    }
}
