<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand = $this->faker->randomElement(['Kia', 'Hyundai', 'Toyota', 'Mazda', 'Renault']);
        $model = $this->faker->randomElement(['AA', 'BB', 'CC', 'DD', 'EE']);
        $year = $this->faker->randomElement(['2016', '2017', '2018', '2019', '2020']);
        return [
            'brand'=> $brand,
            'model'=> $model,
            'year'=> $year,
        ];
    }
}
