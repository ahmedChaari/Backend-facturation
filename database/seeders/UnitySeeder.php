<?php

namespace Database\Seeders;

use App\Models\Unity;
use Illuminate\Database\Seeder;

class UnitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unity::create([
            'name'           =>   'kg',
        ]);
        Unity::create([
            'name'           =>   'littre',
        ]);
        Unity::create([
            'name'           =>   'mettre',
        ]);
        Unity::create([
            'name'           =>   'piece',
        ]);
    }
}
