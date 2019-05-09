<?php

use App\Supermarket;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-05-09
 * Time: 15:52
 */

class SupermarketsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 5; $i++) {
            Supermarket::create([
                                    'name' => $faker->name,
                                ]);
        }
    }
}