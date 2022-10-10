<?php

namespace Database\Seeders;

use App\Models\Deposit;
use Illuminate\Database\Seeder;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Deposit::factory(20)->create();
    }
}
