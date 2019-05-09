<?php

use App\Vehicle;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create vehicle types records
        Vehicle::create([
            'type' => 'Car',
            'slug' => 'car',
            'quantity' => 1,
            'spots_occupied' => 1,
                        ]);

        Vehicle::create([
                            'type' => 'Motorbike',
                            'slug' => 'motorbike',
                            'quantity' => 5,
                            'spots_occupied' => 1,
                        ]);

        Vehicle::create([
                            'type' => 'Bus',
                            'slug' => 'bus',
                            'quantity' => 1,
                            'spots_occupied' => 3,
                        ]);

        Vehicle::create([
                            'type' => 'Trailer',
                            'slug' => 'trailer',
                            'quantity' => 1,
                            'spots_occupied' => 5,
                        ]);
    }
}
