<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleDriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'driver_id'=> Driver::factory(),
            'vehicle_id'=> Vehicle::factory(),
            'date_init' => $this->faker->dateTimeBetween('-3 month', '+5 month')->getTimestamp(),
            'date_end' => $this->faker->dateTimeBetween('-3 month', '+5 month')->getTimestamp(),
        ];
    }
}
