<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'nom'        => $this->faker->firstName ,
            'prenom'     => $this->faker->lastName ,
            'email'      => $this->faker->unique()->safeEmail,
            'gender'     => $this->faker->randomElement(['M','F']),
            'adresse'    => $this->faker->address, 
            'pseudo'     => $this->faker->name ,
            'role_id'    => User::all()->random()->id,
            'deposit_id' => Deposit::all()->random()->id,
            'user_id'    => User::all()->random()->id,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
