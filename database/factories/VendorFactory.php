<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
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
            'descreption'=> $this->faker->paragraph(),
            'RC'         => $this->faker->name,
            'tel'        => $this->faker->phoneNumber,
            'fax'        => $this->faker->phoneNumber,
            'ICE'        => $this->faker->numerify('######'),
            'ville'      => $this->faker->name,
            'email'      => $this->faker->unique()->safeEmail(),
            'adresse'    => $this->faker->address,
            // 'email'      => $this->faker->unique()->safeEmail,
        ];
    }
}
