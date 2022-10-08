<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeleRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'         => $this->faker->uuid,
            'company_id' => Company::all()->random()->id,
            'role_id'    => Role::all()->random()->id,
            'name'       => $this->faker->name,
            'consulter'  => $this->faker->boolean(),
            'ajouter'    => $this->faker->boolean(),
            'modifier'   => $this->faker->boolean(),
            'valider'    => $this->faker->boolean(),
            'supprimer'  => $this->faker->boolean(),
            'imprimer'   => $this->faker->boolean(),
            'exporter'   => $this->faker->boolean(),
            'annuler'    => $this->faker->boolean(),
        ];
    }
}
