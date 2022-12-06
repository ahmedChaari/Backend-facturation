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
            'name'           => 'accueil',
        ]);
        Menu::create([
            'name'           => 'parametrage',
        ]);
       // Menu::create([
        //    'name'           => 'entreprise',
      //  ]);
      //  Menu::create([
     //       'name'           => 'utilisateur',
      //  ]);
        Menu::create([
            'name'           => 'stock',
        ]);
        Menu::create([
            'name'           => 'achat',
        ]);
        Menu::create([
            'name'           => 'vente',
        ]);
        Menu::create([
            'name'           => 'tresorerie',
        ]);
        Menu::create([
            'name'           => 'statistique',
        ]);
        Menu::create([
            'name'           => 'caisse',
        ]);
        Menu::create([
            'name'           => 'depence',
        ]);
        Menu::create([
            'name'           => 'credit',
        ]);
        
       
        
    }
}
