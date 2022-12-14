<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = date('dy');
        $reference = 'BE'.$date.'-'.rand(10000,100);
        $bonType = 'BE' ;
        return [
            'id'          => $this->faker->uuid,
            'company_id'  => Company::all()->random()->id,
            'deposit_id'  => Deposit::all()->random()->id,
            'description' => $this->faker->paragraph(),
            'bon_type'    => $bonType,
            'date_bon'    => $this->faker->dateTimeBetween('2004-01-01', '2022-12-31'),
            'user_id'     => User::all()->random()->id,
            'valid'       => $this->faker->boolean(),
            'reference'   => $reference,
        ];
    }
}
