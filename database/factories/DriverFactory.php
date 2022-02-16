<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->where('role_id', User::role_driver)->first()->id,
            'age'=> rand(35,70),
            'date_registered' => $this->faker->date(),
            
        ];
    }
}
