<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\ModelRole;
use Illuminate\Database\Seeder;

class ModelRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            //create menu with role id
            $i = 5 ;
            $n = 10 ;
            $y = 47 ;
            for ($n = 1; $n < 11; $n++){
                for ($i = 1; $i <= 5; $i++) {  
                    ModelRole::create([
                        //'company_id'     => '',
                        'menu_id'        => $n,
                        //'sous_menu_id'   => 1,
                        'role_id'        => $i,
                        'consulter'      => '1',
                        'ajouter'        => '1',
                        'modifier'       => '1',
                        'valider'        => '1',
                        'supprimer'      => '1',
                        'imprimer'       => '1',
                        'exporter'       => '1',
                        'annuler'        => '1',
                    ]);
                }
            };
            
 //create sous menu with role id

            for ($y = 1; $y < 48; $y++){
                for ($i = 1; $i <= 5; $i++) {  
                        ModelRole::create([
                            //'company_id'     => '',
                            //'menu_id'        => $n,
                            'sous_menu_id'   => $y,
                            'role_id'        => $i,
                            'consulter'      => '1',
                            'ajouter'        => '1',
                            'modifier'       => '1',
                            'valider'        => '1',
                            'supprimer'      => '1',
                            'imprimer'       => '1',
                            'exporter'       => '1',
                            'annuler'        => '1',
                        ]);
                    }
            }
        }
    }
}