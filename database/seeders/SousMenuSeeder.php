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
        SousMenu::create([
            'name'           => 'table de reference',
        ]);
        SousMenu::create([
            'name'           => 'gestion des profiles',
        ]);
        SousMenu::create([
            'name'           => 'parametrage general',
        ]);
        SousMenu::create([
            'name'           => 'sessions',
        ]);
        SousMenu::create([
            'name'           => 'modele pdf',
        ]);
//
        SousMenu::create([
            'name'           => 'list des produit',
        ]);
        SousMenu::create([
            'name'           => 'list des depots',
        ]);
        SousMenu::create([
            'name'           => 'bon entree',
        ]);
        SousMenu::create([
            'name'           => 'bon des sortie',
        ]);
        SousMenu::create([
            'name'           => 'bon de transfert',
        ]);


        SousMenu::create([
            'name'           => 'histoire des mouvements',
        ]);
        SousMenu::create([
            'name'           => 'mon stock',
        ]);
        SousMenu::create([
            'name'           => 'inventaire',
        ]);
        SousMenu::create([
            'name'           => 'produit a commander',
        ]);
        //
        SousMenu::create([
            'name'           => 'list des fournisseurs',
        ]);
        SousMenu::create([
            'name'           => 'demande de prix',
        ]);
        SousMenu::create([
            'name'           => 'bon de commande',
        ]);
        SousMenu::create([
            'name'           => 'bon de reception',
        ]);
        SousMenu::create([
            'name'           => 'facture d\'achat',
        ]);
        
        SousMenu::create([
            'name'           => 'bon de retour',
        ]);
        // vent
        SousMenu::create([
            'name'           => 'liste des clients',
        ]);
        SousMenu::create([
            'name'           => 'devis',
        ]);
        SousMenu::create([
            'name'           => 'bon de livraison',
        ]);
        SousMenu::create([
            'name'           => 'facture',
        ]);
        SousMenu::create([
            'name'           => 'bon de retour (vent)',
        ]);
        SousMenu::create([
            'name'           => 'avoir',
        ]);
        //tresorerie
        SousMenu::create([
            'name'           => 'encaissement client',
        ]);
        SousMenu::create([
            'name'           => 'encaissement fournisseur',
        ]);
        SousMenu::create([
            'name'           => 'historique paiements client',
        ]);
        SousMenu::create([
            'name'           => 'calendrier',
        ]);
        // statistique
        SousMenu::create([
            'name'           => 'journal de vente',
        ]);
        SousMenu::create([
            'name'           => 'journal des achats',
        ]);
        SousMenu::create([
            'name'           => 'reporting par commercial',
        ]);
        SousMenu::create([
            'name'           => 'reporting par client',
        ]);
        SousMenu::create([
            'name'           => 'reporting par produit',
        ]);
        SousMenu::create([
            'name'           => 'reporting par fornisseur',
        ]);
        SousMenu::create([
            'name'           => 'situation client',
        ]);
        SousMenu::create([
            'name'           => 'situation fornisseur',
        ]);
        //depence
        SousMenu::create([
            'name'           => 'categorie depence',
        ]);
        SousMenu::create([
            'name'           => 'depence',
        ]);
        //credit
        SousMenu::create([
            'name'           => 'credit client',
        ]);
        SousMenu::create([
            'name'           => 'credirt fournisseur',
        ]);
    }
}
