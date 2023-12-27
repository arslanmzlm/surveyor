<?php

namespace Database\Factories;

use App\Helpers\Mutators;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'username' => $this->faker->unique()->userName(),
            'phone' => Mutators::cleanPhone($this->faker->phoneNumber()),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => \Hash::make('123456'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
