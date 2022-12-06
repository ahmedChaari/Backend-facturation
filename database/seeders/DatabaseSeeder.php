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
            AgenceSeeder::class,
            MenuSeeder::class,
            SousMenuSeeder::class,
            CompanySeeder::class,
            VendorSeeder::class,
            CategorySeeder:: class,
            DepositSeeder::class, 
            RoleSeeder::class,
            ModelRoleSeeder::class,
            ClientTypeSeeder::class,
            UnitySeeder::class,
            UserSeeder::class,
            ProdcutSeeder::class,
        ]);
    }
}
