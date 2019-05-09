<?php

use App\ParkingSpot;
use Illuminate\Database\Seeder;

class ParkingSpotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            ParkingSpot::create([
                                    'number' => $i,
                                    'occupied' => 0,
                                ]);
        }
    }
}
