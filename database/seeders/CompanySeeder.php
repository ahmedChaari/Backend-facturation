<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Company::create([
        'name'              =>   'Mind-Com',
        'date_creation'     =>   '2018-02-11',
        'ICE'               =>   '123456789000057',
        'fiscale'           =>   '50189274',
        'registre_commerce' =>   '132741',
        'patent'            =>   '000000',
        'cnss'              =>   '000000',
        'activite'          =>   'vente des produits metalique',
        'gerant'            => 'ahmed chaari',
        'contact'           =>   'contact@mindcom.ma',
        'adresse'           =>   '129 Avenue de caire APT N°2 Témara Maroc',
        'tel'               =>   '0664647978',
        'tel_mobile'        =>   '0500000000',
        'fax'               =>   '0500000000',
        'email'             =>   'mindcom@gmail.com',
        'web'               =>   'mindcom.ma',
        'logo'              =>   '',
            ]);

    Company::create([
        'name'              =>   'moda-dis',
        'date_creation'     =>   '2015-12-23',
        'ICE'               =>   '234556789000057',
        'fiscale'           =>   '12189274',
        'registre_commerce' =>   '902741',
        'patent'            =>   '000000',
        'cnss'              =>   '000000',
        'activite'          =>   'distrebution',
        'gerant'            =>    'morad morad',
        'contact'           =>   'contact@moda-dis.com',
        'adresse'           =>   '45 Rue sebtta N°2 kenitra Maroc',
        'tel'               =>   '0664641212',
        'tel_mobile'        =>   '0500000000',
        'fax'               =>   '0500000000',
        'email'             =>   'moda-dis@gmail.com',
        'web'               =>   'moda-dis.com',
        'logo'              =>   '',
            ]);
    Company::create([
        'name'              =>   'jil-fer',
        'date_creation'     =>   '2007-03-06',
        'ICE'               =>   '433456789000057',
        'fiscale'           =>   '87189274',
        'registre_commerce' =>   '342741',
        'patent'            =>   '000000',
        'cnss'              =>   '000000',
        'activite'          =>   'vente des produit metalique',
        'gerant'            =>   'mohamed mohamed',
        'contact'           =>   'contact@jilfer.ma',
        'adresse'           =>   'Rue sakniat N°102 rabat Maroc',
        'tel'               =>   '0789647978',
        'tel_mobile'        =>   '0500000000',
        'fax'               =>   '0500000000',
        'email'             =>   'jilfer@gmail.com',
        'web'               =>   'jil-fer.ma',
        'logo'              =>   '',
            ]);
    Company::create([
        'name'              =>   'aycer',
        'date_creation'     =>   '2020-01-17',
        'ICE'               =>   '233456789000057',
        'fiscale'           =>   '40189274',
        'registre_commerce' =>   '932741',
        'patent'            =>   '000000',
        'cnss'              =>   '000000',
        'activite'          =>   'vente des produit metalique',
        'gerant'            =>   'abdo chaari',
        'contact'           =>   'contact@aycer.ma',
        'adresse'           =>   '90 Avenue de caire APT N°23 laayoune Maroc',
        'tel'               =>   '0442647978',
        'tel_mobile'        =>   '0500000000',
        'fax'               =>   '0500000000',
        'email'             =>   'maycer@gmail.com',
        'web'               =>   'aycer.ma',
        'logo'              =>   '',
            ]);                
    }
}
