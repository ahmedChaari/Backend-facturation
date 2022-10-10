<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepositFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'          => $this->faker->uuid,
            'company_id'  => Company::all()->random()->id,
            'name'        => $this->faker->name,
        ];
    }
}
