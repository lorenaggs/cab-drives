<?php

namespace Database\Factories;

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
            'name'=> $this->faker->name(),
            'last_name'=> $this->faker->lastName(),
            'dni'=> $this->faker->numerify('##########'),
            'phone'=> $this->faker->numerify('09########'),
        ];
    }
}
