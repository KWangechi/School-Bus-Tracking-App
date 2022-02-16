<?php

namespace Database\Factories;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'driver_id' => Driver::inRandomOrder()->first()->id,
            'number_plate' => 'KCY-778R',
            'date_registered' => $this->faker->date(),
            'designated_route' => 'Muthaiga'
            // 'designated_route' => null
        ];
    }
}
