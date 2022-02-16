<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'guardian_id' => Guardian::inRandomOrder()->first()->id,
            'name' => $this->faker->name(),
            'age' => rand(7,14),
            'class' => rand(1,8)
        ];
    }
}
