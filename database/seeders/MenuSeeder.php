<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name'           => 'parametrage',
        ]);
        Menu::create([
            'name'           => 'entreprise',
        ]);
        Menu::create([
            'name'           => 'utilisateur',
        ]);
        Menu::create([
            'name'           => 'stock',
        ]);
        Menu::create([
            'name'           => 'achat',
        ]);
        Menu::create([
            'name'           => 'vent',
        ]);
        Menu::create([
            'name'           => 'tresorerie',
        ]);
        Menu::create([
            'name'           => 'statistique',
        ]);
        Menu::create([
            'name'           => 'depence',
        ]);
        Menu::create([
            'name'           => 'credit',
        ]);
       
        
    }
}
