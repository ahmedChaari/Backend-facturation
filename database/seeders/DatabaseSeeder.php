<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\SousMenu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            SousMenuSeeder::class,
            MenuSeeder::class,
            CompanySeeder::class,
            VendorSeeder::class,
            CategorySeeder:: class,
            DepositSeeder::class, 
            UserSeeder::class,
            ProdcutSeeder::class,
        ]);
    }
}
