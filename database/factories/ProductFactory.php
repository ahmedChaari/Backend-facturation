<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Deposit;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'           => $this->faker->uuid,
            'company_id'   => Company::all()->random()->id,
            'user_id'      => User::all()->random()->id,
          //  'path_image'   => $this->faker->image('public/storage/image/product', 400, 300, null, true),
            'reference'    => $this->faker->name,
            'vendor_id'    => Vendor::all()->random()->id,
            'designation'  => $this->faker->paragraph(),
            'prix_achat'   => $this->faker->randomFloat(3, 0, 100),
            'prix_vente'   => $this->faker->randomFloat(3, 0, 100),
            'category_id'  => Category::all()->random()->id,
            'unite'        => $this->faker->randomElement(['kg','metre','littre','piece']) ,
            'code_bare'    => $this->faker->numerify('#####'),
            'stock_min'    => $this->faker->numerify('##'),
            'tva'          => $this->faker->numerify('##'),
            'actif'        => $this->faker->boolean(),
            'rayon_a'      => $this->faker->name,
            'rayon_b'      => $this->faker->name,
            'deposit_id'   => Deposit::all()->random()->id,
            'quantite_initial'     => $this->faker->numerify('###'),
            'description'  => $this->faker->paragraph(),
        ];
    }
}
