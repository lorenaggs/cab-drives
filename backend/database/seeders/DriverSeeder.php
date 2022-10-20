<?php

namespace Database\Seeders;

use App\Models\Drivers;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drivers::factory()
            ->count(25)
            ->create();

        Vehicle::factory()
            ->count(25)
            ->create();
    }
}
