<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agence;

class AgenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agence::create([
            'name'           =>   'BMCE',
            'libelle'        =>   'BMCE',
                ]);
        Agence::create([
            'name'           =>   'Socété générale',
            'libelle'        =>   'SG',
                ]);
        Agence::create([
            'name'           =>   'CFG banque',
            'libelle'        =>   'CB',
                ]);
        Agence::create([
            'name'           =>   'BMCI',
            'libelle'        =>   'BMCI',
                        ]);
        Agence::create([
            'name'           =>   'CIH',
            'libelle'        =>   'CIH',
                        ]);
        Agence::create([
            'name'           =>   'Banque chaabi',
            'libelle'        =>   'BC',
                                ]);
                                                                                                            
    }
}
