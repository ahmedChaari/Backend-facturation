<?php

namespace Database\Seeders;

use App\Models\SousMenu;
use Illuminate\Database\Seeder;

class SousMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id = 2
        SousMenu::create([
            'name'           => 'entreprise',
            'menu_id'   => '2',
        ]);
        SousMenu::create([
            'name'           => 'utilisateur',
            'menu_id'   => '2',
        ]);
        SousMenu::create([
            'name'      => 'table de reference',
            'menu_id'   => '2',
        ]);
        SousMenu::create([
            'name'           => 'gestion des profiles',
            'menu_id'   => '2',
        ]);
        SousMenu::create([
            'name'           => 'parametrage general',
            'menu_id'   => '2',
        ]);
        SousMenu::create([
            'name'           => 'sessions',
            'menu_id'   => '2',
        ]);
        SousMenu::create([
            'name'           => 'modele pdf',
            'menu_id'   => '2',
        ]);
       
// id =3 
        SousMenu::create([
            'name'           => 'list des produit',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'list des depots',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'bon entree',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'bon des sortie',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'bon de transfert',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'histoire des mouvements',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'mon stock',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'inventaire',
            'menu_id'   => '3',
        ]);
        SousMenu::create([
            'name'           => 'produit a commander',
            'menu_id'   => '3',
        ]);
        // id =4
        SousMenu::create([
            'name'           => 'list des fournisseurs',
            'menu_id'   => '4',
        ]);
        SousMenu::create([
            'name'           => 'demande de prix',
            'menu_id'   => '4',
        ]);
        SousMenu::create([
            'name'           => 'bon de commande',
            'menu_id'   => '4',
        ]);
        SousMenu::create([
            'name'           => 'bon de reception',
            'menu_id'   => '4',
        ]);
        SousMenu::create([
            'name'           => 'facture d\'achat',
            'menu_id'   => '4',
        ]);
        
        SousMenu::create([
            'name'           => 'bon de retour',
            'menu_id'   => '4',
        ]);
        // id = 5
        SousMenu::create([
            'name'           => 'liste des clients',
            'menu_id'   => '5',
        ]);
        SousMenu::create([
            'name'           => 'devis',
            'menu_id'   => '5',
        ]);
        SousMenu::create([
            'name'           => 'bon de livraison',
            'menu_id'   => '5',
        ]);
        SousMenu::create([
            'name'           => 'facture',
            'menu_id'   => '5',
        ]);
        SousMenu::create([
            'name'           => 'bon de retour (vent)',
            'menu_id'   => '5',
        ]);
        SousMenu::create([
            'name'           => 'avoir',
            'menu_id'   => '5',
        ]);
        //tresorerie
        SousMenu::create([
            'name'           => 'encaissement client',
            'menu_id'   => '6',
        ]);
        SousMenu::create([
            'name'           => 'encaissement fournisseur',
            'menu_id'   => '6',
        ]);
        SousMenu::create([
            'name'           => 'historique paiements client',
            'menu_id'   => '6',
        ]);
        SousMenu::create([
            'name'           => 'calendrier',
            'menu_id'   => '6',
        ]);
        // statistique
        SousMenu::create([
            'name'           => 'journal de vente',
            'menu_id'   => '7',
        ]);
        SousMenu::create([
            'name'           => 'journal des achats',
            'menu_id'   => '7',
        ]);
        SousMenu::create([
            'name'           => 'reporting par commercial',
            'menu_id'   => '7',
        ]);
        SousMenu::create([
            'name'           => 'reporting par client',
            'menu_id'   => '7',
        ]);
        SousMenu::create([
            'name'           => 'reporting par produit',
            'menu_id'   => '7',
        ]);
        SousMenu::create([
            'name'           => 'reporting par fornisseur',
            'menu_id'   => '7',
        ]);
        SousMenu::create([
            'name'           => 'situation client',
            'menu_id'   => '7',
        ]);
        SousMenu::create([
            'name'           => 'situation fornisseur',
            'menu_id'   => '7',
        ]);
        //id =8
        SousMenu::create([
            'name'           => 'list des caisse',
            'menu_id'   => '8',
        ]);
        SousMenu::create([
            'name'           => 'alimentation de caisse',
            'menu_id'   => '8',
        ]);
        SousMenu::create([
            'name'           => 'histoire des opertions',
            'menu_id'   => '8',
        ]);
        // id = 9
        SousMenu::create([
            'name'           => 'categorie depence',
            'menu_id'   => '9',
        ]);
        SousMenu::create([
            'name'           => 'depence',
            'menu_id'   => '9',
        ]);
        //credit id = 10
        SousMenu::create([
            'name'           => 'credit client',
            'menu_id'   => '10',
        ]);
        SousMenu::create([
            'name'           => 'credirt fournisseur',
            'menu_id'   => '10',
        ]);
    }
}
