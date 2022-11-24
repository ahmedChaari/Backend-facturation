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
            ModelRole::create([
                'name'           => 'table de reference',
                'model'          => 'parametrage',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'           =>   'gestion des profiles',
                'model'          =>   'parametrage',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'      =>   'parametrage general',
                'model'     =>   'parametrage',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'      =>   'modele pdf',
                'model'     =>   'parametrage',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'      =>   'sessions',
                'model'     =>   'parametrage',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
    
                    ModelRole::create([
                'name'      =>   'list des produit',
                'model'     =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'              =>   'list des depots',
                'model'     =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'              =>   'bon entree',
                'model'     =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'              =>   'bon des sortie',
                'model'     =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'           =>   'bon de transfert',
                'model'          =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'              =>   'histoire des mouvements',
                'model'     =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'              =>   'mon stock',
                'model'     =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'           =>  'inventaire',
                'model'          => 'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                    ModelRole::create([
                'name'           =>   'produit a commander',
                'model'          =>   'stock',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
            ModelRole::create([
                'name'           =>   'list des fournisseurs',
                'model'          =>   'achat',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
            ]);
            ModelRole::create([
                'name'           =>   'demande de prix',
                'model'          =>   'achat',
                'role_id'        => '1',
                'consulter'      => '1',
                'ajouter'        => '1',
                'modifier'       => '1',
                'valider'        => '1',
                'supprimer'      => '1',
                'imprimer'       => '1',
                'exporter'       => '1',
                'annuler'        => '1',
                    ]);
                ModelRole::create([
                    'name'           =>   'bon de commande',
                    'model'          =>   'achat',
                    'role_id'        => '1',
                    'consulter'      => '1',
                    'ajouter'        => '1',
                    'modifier'       => '1',
                    'valider'        => '1',
                    'supprimer'      => '1',
                    'imprimer'       => '1',
                    'exporter'       => '1',
                    'annuler'        => '1',
                        ]);
                ModelRole::create([
                    'name'           =>   'bon de reception',
                    'model'          =>   'achat',
                    'role_id'        => '1',
                    'consulter'      => '1',
                    'ajouter'        => '1',
                    'modifier'       => '1',
                    'valider'        => '1',
                    'supprimer'      => '1',
                    'imprimer'       => '1',
                    'exporter'       => '1',
                    'annuler'        => '1',
                        ]);
                ModelRole::create([
                    'name'           =>   'facture d\'achat',
                    'model'          =>   'achat',
                    'role_id'        => '1',
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
